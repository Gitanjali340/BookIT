// booking.js

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('booking-modal');
    const closeBtn = document.getElementsByClassName('close')[0];
    const movieTitle = document.getElementById('movie-title');
    const seatSelection = document.getElementById('seat-selection');
    const totalPrice = document.getElementById('total-price');
    const confirmBookingBtn = document.getElementById('confirm-booking');
    const bookingsList = document.getElementById('bookings-list');

    let selectedSeats = [];
    const ticketPrice = 200; // Price per ticket

    // Open modal when "Book Now" is clicked
    document.querySelectorAll('.book-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const movie = e.target.closest('.book-btn').dataset.movie;
            openBookingModal(movie);
        });
    });

    // Close modal when (x) is clicked
    closeBtn.onclick = () => {
        modal.style.display = 'none';
    };

    // Close modal when clicking outside of it
    window.onclick = (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    function openBookingModal(movie) {
        movieTitle.textContent = movie;
        generateSeats();
        modal.style.display = 'block';
    }

    function generateSeats() {
        seatSelection.innerHTML = '';
        for (let i = 0; i < 48; i++) {
            const seat = document.createElement('div');
            seat.classList.add('seat');
            if (Math.random() < 0.3) { // 30% chance of a seat being occupied
                seat.classList.add('occupied');
            } else {
                seat.addEventListener('click', toggleSeat);
            }
            seatSelection.appendChild(seat);
        }
    }

    function toggleSeat(e) {
        e.target.classList.toggle('selected');
        updateSelectedSeats();
    }

    function updateSelectedSeats() {
        selectedSeats = Array.from(seatSelection.querySelectorAll('.seat.selected'));
        totalPrice.textContent = selectedSeats.length * ticketPrice;
    }

    confirmBookingBtn.addEventListener('click', () => {
        if (selectedSeats.length === 0) {
            alert('Please select at least one seat.');
            return;
        }

        const booking = {
            movie: movieTitle.textContent,
            seats: selectedSeats.length,
            total: selectedSeats.length * ticketPrice,
            date: new Date().toLocaleDateString()
        };

        addBookingToList(booking);
        modal.style.display = 'none';
        selectedSeats = [];
        totalPrice.textContent = '0';

        const bookings = JSON.parse(localStorage.getItem('bookings')) || [];
        bookings.push(booking);
        localStorage.setItem('bookings', JSON.stringify(bookings));

        generateTicket(booking); // Generate and download the ticket

        modal.style.display = 'none';
        selectedSeats = [];
        totalPrice.textContent = '0';
    });

    /*confirmBookingBtn.addEventListener('click', () => {
        if (selectedSeats.length === 0) {
            alert('Please select at least one seat.');
            return;
        }

        const booking = {
            user_id: localStorage.getItem('user_id'), // Assume user_id is stored in localStorage after login
            movie_id: movieTitle.dataset.movieId, // Assume movie_id is stored in the dataset of the movie title element
            seats: selectedSeats.length,
            total_price: selectedSeats.length * ticketPrice
        };

        fetch('movie_booking_handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'addBooking',
                ...booking
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                addBookingToList({
                    title: movieTitle.textContent,
                    ...booking,
                    booking_date: new Date().toLocaleDateString()
                });
                modal.style.display = 'none';
                selectedSeats = [];
                totalPrice.textContent = '0';
                alert('Booking successful!');
            } else {
                alert('Booking failed. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });*/

    function addBookingToList(booking) {
        const bookingItem = document.createElement('div');
        bookingItem.classList.add('booking-item');
        bookingItem.innerHTML = `
            <h3>${booking.movie}</h3>
            <p>Seats: ${booking.seats}</p>
            <p>Total: $${booking.total}</p>
            <p>Date: ${booking.booking_date}</p>
        `;
        bookingsList.appendChild(bookingItem);
    }

    function generateTicket(booking) {
        const ticketHtml = `
            <div style="width: 300px; padding: 20px; border: 2px solid #000; font-family: Arial, sans-serif;">
                <h2 style="text-align: center;">Movie Ticket</h2>
                <p><strong>Movie:</strong> ${booking.movie}</p>
                <p><strong>Seats:</strong> ${booking.seats}</p>
                <p><strong>Total:</strong> $${booking.total}</p>
                <p><strong>Date:</strong> ${booking.date}</p>
            </div>
        `;

        const blob = new Blob([ticketHtml], {type: 'text/html'});
        const ticketUrl = URL.createObjectURL(blob);
    
        const downloadLink = document.createElement('a');
        downloadLink.href = ticketUrl;
        downloadLink.download = `ticket_${booking.movie.replace(/\s+/g, '_')}.html`;
        downloadLink.click();
    
        URL.revokeObjectURL(ticketUrl);
    }

    function loadUserBookings() {
        const userId = localStorage.getItem('user_id');
        if (!userId) return;

        fetch(`movie_booking_handler.php?action=getUserBookings&user_id={$userId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                bookingsList.innerHTML = ''; // Clear existing bookings
                data.bookings.forEach(addBookingToList);
            } else {
                console.error('Failed to load bookings:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    loadUserBookings();
});