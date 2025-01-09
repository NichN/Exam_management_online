<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
</head>
<body>
    <form id="loginForm">
        @csrf
        <div class="login-container">
            <img src="/Image/norton.png" alt="Logo">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </div>
    </form>

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
            const role = data.role;

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
