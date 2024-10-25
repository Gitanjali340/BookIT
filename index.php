<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="shortcut icon" href="img/fav-icon.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="nav container">
            <a href="index.php" class="logo">
                BOOK<span>IT</span>

            </a>
            <div class="search-box">
                <input type="search" name="" id="search-input" placeholder="Search Movie">
                <i class='bx bx-search'></i>
            </div>
            <div class="user">
                <img src="img/user.jpg" alt="" class="user-img">
                <span id="username-display"></span>
                <button id="logout-btn" style="display: none;">Logout</button>
            </div>
            <div class="navbar">
                <a href="#home" class="nav-link nav-active">
                    <i class='bx bx-home'></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="#popular" class="nav-link">
                    <i class='bx bxs-hot'></i>
                    <span class="nav-link-title">Trending</span>
                </a>
                <a href="#movies" class="nav-link">
                    <i class='bx bx-movie'></i>
                    <span class="nav-link-title">Movies</span>
                </a>
                <a href="#bookings" class="nav-link">
                    <i class='bx bx-book-add'></i>
                    <span class="nav-link-title">My Bookings</span>
                </a>

            </div>
        </div>
    </header>

    <section class="home container" id="home">
        <img src="img/home-background.png" alt="" class="home-img">
        <div class="home-text">
            <h1 class="home-title">Hitman's Wife's <br>Bodyguard</h1>
            <p>Releasing 10 April</p>
            <a href="#" class="book-btn" data-movie="Hitman's Wife's Bodyguard" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                <i class='bx bx-right-arrow'></i>
                <span>Book Now</span>
            </a>
        </div>
    </section>

    <section class="popular container" id="popular">
        <div class="heading">
            <h2 class="heading-title">Popular Movies</h2>
            <div class="swiper-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="popular-content swiper">
            <div class="swiper-wrapper">
                <!-- Movies Box 1 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-1.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Spider-man: No Way Home</h2>
                            <span class="movie-type">Action/Sci-Fi</span>
                            <a href="#" class="watch-btn book-btn" data-movie="Spider-man: No Way Home" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>

                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 2 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-2.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title"> Jungle Cruise</h2>
                            <span class="movie-type">Action/Adventure</span>
                            <a href="#" class="watch-btn book-btn" data-movie="Jungle Cruise" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>

                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 3 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-3.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Loki</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn book-btn" data-movie="Loki" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 4 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-4.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Squid Game</h2>
                            <span class="movie-type">Action/Drama</span>
                            <a href="#" class="watch-btn book-btn" data-movie="Squid Game" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 5 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-5.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">The Falcon and The Winter Soldier</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn book-btn" data-movie="The Falcon and The Winter Soldier" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 6 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-6.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Hawkeye</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn book-btn" data-movie="Hawkeye" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 7 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-7.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Agents of S.H.E.I.L.D</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn book-btn" data-movie="Agents of S.H.E.I.L.D" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Movies Box 8 -->
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="img/popular-movie-8.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">The Flash</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn book-btn" data-movie="The Flash" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                                <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="movies container" id="movies">
        <div class="heading">
            <h2 class="heading-title">Movies Now Showing</h2>
        </div>
        <div class="movies-content">
            <!-- Movies Box 1 -->
            <div class="movie-box">
                <img src="img/movie-1.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Jumanji: Welcome to the Jungle</h2>
                    <span class="movie-type">Action</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Jumanji: Welcome to the Jungle" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 2 -->    
            <div class="movie-box">
                <img src="img/movie-2.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Hitman's Wife's Bodyguard</h2>
                    <span class="movie-type">Action/Comedy</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Hitman's Wife's Bodyguard" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 3 -->
            <div class="movie-box">
                <img src="img/movie-3.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Shang-Chi</h2>
                    <span class="movie-type">Action/Sci-Fi</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Shang-Chi" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 4 -->
            <div class="movie-box">
                <img src="img/movie-4.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Eternals</h2>
                    <span class="movie-type">Action/Sci-Fi</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Eternals" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 5 -->
            <div class="movie-box">
                <img src="img/movie-5.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Spectre</h2>
                    <span class="movie-type">Action</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Spectre" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 6 -->
            <div class="movie-box">
                <img src="img/movie-6.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Money Heist</h2>
                    <span class="movie-type">Action</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Money Heist" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 7 -->
            <div class="movie-box">
                <img src="img/movie-7.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">The Wolverine</h2>
                    <span class="movie-type">Action/Sci-Fi</span>
                    <a href="#" class="watch-btn book-btn" data-movie="The Wolverine" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
            <!-- Movies Box 8 -->
            <div class="movie-box">
                <img src="img/movie-8.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Johnny English</h2>
                    <span class="movie-type">Action/Comedy</span>
                    <a href="#" class="watch-btn book-btn" data-movie="Johnny English" data-movie-id="<?php echo $movie['id']; ?>" data-movie-title="<?php echo htmlspecialchars($movie['title']); ?>">
                        <i class='bx bx-right-arrow' ></i>
                                <span>Book Now</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bookings container" id="bookings">
        <div class="heading">
            <h2 class="heading-title">My Bookings</h2>
        </div>
        <div id="bookings-list">
            <!-- Bookings will be dynamically added here -->
        </div>
    </section>

    <div id="booking-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="movie-title"></h2>
            <div id="seat-selection">
                <!-- Seat selection interface will be dynamically generated here -->
            </div>
            <p>Total: $<span id="total-price">0</span></p>
            <button id="confirm-booking">Confirm Booking</button>
        </div>
    </div>

    <div class="copyright">
        <p>&#169; BOOKIT All Rights Reserved</p>
    </div>

    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/booking.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loggedIn = localStorage.getItem('loggedIn');
            const username = localStorage.getItem('username');
            const logoutBtn = document.getElementById('logout-btn');
            const usernameDisplay = document.getElementById('username-display');

            if (loggedIn === 'true' && username) {
                usernameDisplay.textContent = username;
                logoutBtn.style.display = 'inline-block';
            } else {
                window.location.href = 'Login.php'; // Redirect to login if not authenticated
            }

            logoutBtn.addEventListener('click', () => {
                localStorage.removeItem('loggedIn');
                localStorage.removeItem('username');
                window.location.href = 'Login.php';
            });
        });
    </script>
</body>
</html>

<?php
include('db_connect.php');
?>