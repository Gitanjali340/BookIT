<?php
// user_login.php

require_once 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['username']) && isset($input['password'])) {
        $username = $input['username'];
        $password = $input['password'];
        
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo json_encode([
                    'success' => true, 
                    'message' => 'Login successful',
                    'user_id' => $user['id'],
                    'username' => $user['username']
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
            }
        } catch(PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Login failed: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Username or password not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>