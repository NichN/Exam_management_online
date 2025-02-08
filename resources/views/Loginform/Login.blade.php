<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <img src="/Image/norton.png" alt="Logo" class="logo">
        <h2>Welcome Back</h2>
        <p class="subtitle">Sign in to continue</p>

        <form id="loginForm">
            @csrf
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="forgot-password">
                <a href="/password/email" class="forgot-password-link">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

        <p class="signup-text">Don't have an account? <a href="/register">Sign up</a></p>
    </div>
</div>

<script>
    const login = async (email, password) => {
        try {
            const response = await fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                const token = data.token;
                const role = data.role;
                localStorage.setItem('authToken', token);
                if (role === 'teacher') {
                    window.location.href = '/admin/dashboard';
                } else if (role === 'student') {
                    window.location.href = '/student/dashboard';
                } else {
                    alert('Role not recognized!');
                }
            } else {
                alert(data.message || 'Login failed.');
            }
        } catch (error) {
            console.error('Error logging in:', error);
            alert('An error occurred. Please try again.');
        }
    };

    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        login(email, password);
    });
</script>
</body>
</html>
