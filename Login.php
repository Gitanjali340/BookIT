<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BOOKIT</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: var(--container-color);
            border-radius: 0.5rem;
        }
        .login-form {
            display: flex;
            flex-direction: column;
        }
        .login-form input {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 0.3rem;
        }
        .login-form button {
            background-color: var(--main-color);
            color: var(--text-color);
            border: none;
            padding: 10px;
            border-radius: 0.3rem;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: var(--hover-color);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to BOOKIT</h2>
        <form action = "user_login.php" METHOD = 'POST' class="login-form" id="loginForm">
            <input type="text" id="username" placeholder="Username" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="http://localhost/BookIT/Registration.php">Register here</a></p>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // Here you would typically send these credentials to a server for validation
            // For this example, we'll just simulate a successful login
            localStorage.setItem('loggedIn', 'true');
            localStorage.setItem('username', username);
            window.location.href = 'index.php'; // Redirect to home page after login
        });
    </script>
</body>
</html>