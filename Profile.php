<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - BOOKIT</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <!-- Include your header content here -->
    </header>

    <section class="container">
        <h2>My Profile</h2>
        <div id="profile-info">
            <p><strong>Username:</strong> <span id="profile-username"></span></p>
            <p><strong>Email:</strong> <span id="profile-email"></span></p>
            <!-- Add more profile fields as needed -->
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const username = localStorage.getItem('username');
            const email = localStorage.getItem('email'); // You'd need to store this during registration

            document.getElementById('profile-username').textContent = username || 'Not set';
            document.getElementById('profile-email').textContent = email || 'Not set';
        });
    </script>
</body>
</html>