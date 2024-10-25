<?php
// get_user_bookings.php

require_once 'db_connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("
            SELECT b.id, m.title, b.seats, b.total_price, b.booking_date 
            FROM bookings b 
            JOIN movies m ON b.movie_id = m.id 
            WHERE b.user_id = ?
        ");
        $stmt->execute([$user_id]);
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['success' => true, 'bookings' => $bookings]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to fetch bookings: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
}
?>