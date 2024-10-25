<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BOOKIT</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: var(--container-color);
            border-radius: 0.5rem;
        }
        .register-form {
            display: flex;
            flex-direction: column;
        }
        .register-form input {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 0.3rem;
        }
        .register-form button {
            background-color: var(--main-color);
            color: var(--text-color);
            border: none;
            padding: 10px;
            border-radius: 0.3rem;
            cursor: pointer;
        }
        .register-form button:hover {
            background-color: var(--hover-color);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register for BOOKIT</h2>
        <form action = 'register.php' method = 'POST' class="register-form" id="registerForm">
            <input type="text" id="username" placeholder="Username" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="Login.php">Login here</a></p>
    </div>

    <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (password !== confirmPassword) {
        alert("Passwords don't match");
        return;
    }
    
    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            username: username,
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);  // Log the response for debugging
        if (data.success) {
            alert(data.message);
            window.location.href = 'index.php';
        } else {
            alert(data.message);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
    });
    </script>
<!--
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert("Passwords don't match");
                return;
            }
            
            // Here you would typically send this data to a server to create a new account
            // For this example, we'll just simulate a successful registration
            localStorage.setItem('username', username);
            localStorage.setItem('email', email);
            localStorage.setItem('loggedIn', 'true');
            //window.location.href = 'index.php'; // Redirect to home page after registration
        });
    </script>
-->
</body>
</html>