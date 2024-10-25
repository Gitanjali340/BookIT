<?php
// book_ticket.php

require_once 'db_connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $movie_id = $_POST['movie_id'];
    $seats = $_POST['seats'];
    $total_price = $_POST['total_price'];

    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, movie_id, seats, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $movie_id, $seats, $total_price]);
        $booking_id = $pdo->lastInsertId();
        echo json_encode(['success' => true, 'message' => 'Booking successful', 'booking_id' => $booking_id]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Booking failed: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request or user not logged in']);
}
?>