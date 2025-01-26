<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
    <style>
        .forgot-password-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .forgot-password-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .forgot-password-container p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
            outline: none;
        }

        input[type="email"]:focus {
            border-color: #007bff;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-link {
            margin-top: 20px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2 style="color:#0056b3">Forgot Your Password?</h2>
        <p>Enter your email address below and we will send you a link to reset your password.</p>
        <form method="POST" id="forgot-password-form">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn">Send Password Reset Link</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            fetch(`http://127.0.0.1:8000/api/sentverifyemail/${email}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Verification email sent successfully!');
                } else {
                    alert('Failed to send verification email. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while sending the verification email.');
            });
        });
    </script>
</body>
</html>
