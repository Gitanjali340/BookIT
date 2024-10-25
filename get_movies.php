<?php
// get_movies.php

require_once 'db_connect.php';

try {
    $stmt = $pdo->query("SELECT * FROM movies");
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'movies' => $movies]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Failed to fetch movies: ' . $e->getMessage()]);
}
?>