<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - BOOKIT</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <!-- Include your header content here -->
    </header>

    <section class="container">
        <h2>My Bookings</h2>
        <div id="bookings-list">
            <!-- Bookings will be dynamically added here -->
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bookingsList = document.getElementById('bookings-list');
            const bookings = JSON.parse(localStorage.getItem('bookings')) || [];

            bookings.forEach(booking => {
                const bookingItem = document.createElement('div');
                bookingItem.classList.add('booking-item');
                bookingItem.innerHTML = `
                    <h3>${booking.movie}</h3>
                    <p>Seats: ${booking.seats}</p>
                    <p>Total: $${booking.total}</p>
                    <p>Date: ${booking.date}</p>
                `;
                bookingsList.appendChild(bookingItem);
            });
        });
    </script>
</body>
</html>