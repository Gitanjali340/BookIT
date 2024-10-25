<?php
include('db_connect.php');

// Function to add a movie to the database
function addMovie($title, $description, $image_url, $price) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO movies (title, description, image_url, price) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$title, $description, $image_url, $price]);
}

// Function to get all movies from the database
function getMovies() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM movies");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to add a booking to the database
function addBooking($user_id, $movie_id, $seats, $total_price) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, movie_id, seats, total_price) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$user_id, $movie_id, $seats, $total_price]);
}

// Function to get all bookings for a user
function getUserBookings($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT b.id, m.title, b.seats, b.total_price, b.booking_date 
        FROM bookings b 
        JOIN movies m ON b.movie_id = m.id 
        WHERE b.user_id = ?
    ");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['action'])) {
        switch ($input['action']) {
            case 'addMovie':
                $result = addMovie($input['title'], $input['description'], $input['image_url'], $input['price']);
                echo json_encode(['success' => $result]);
                break;
            case 'addBooking':
                $result = addBooking($input['user_id'], $input['movie_id'], $input['seats'], $input['total_price']);
                echo json_encode(['success' => $result]);
                break;
        }
    }
}

// Handle GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'getMovies':
                $movies = getMovies();
                echo json_encode(['success' => true, 'movies' => $movies]);
                break;
            case 'getUserBookings':
                if (isset($_GET['user_id'])) {
                    $bookings = getUserBookings($_GET['user_id']);
                    echo json_encode(['success' => true, 'bookings' => $bookings]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'User ID not provided']);
                }
                break;
        }
    }
}

?>