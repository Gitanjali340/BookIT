<?php
function logMessage($message) {
    error_log(date('Y-m-d H:i:s') . ': ' . $message);
}

logMessage('Register.php script started');

error_reporting(E_ALL);
ini_set('display_errors', 1);
// register.php
require_once 'db_connect.php';

try {
    $pdo->query("SELECT 1");
    error_log("Database connection successful");
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the content type is JSON
    if (strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
        $input = json_decode(file_get_contents('php://input'), true);
    } else {
        // Fall back to $_POST for form-encoded data
        $input = $_POST;
    }
    
    if (isset($input['username']) && isset($input['email']) && isset($input['password'])) {
        $username = trim($input['username']);
        $email = filter_var(trim($input['email']), FILTER_VALIDATE_EMAIL);
        $password = $input['password'];

        if (empty($username) || empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'All fields are required']);
            exit;
        }

        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Invalid email format']);
            exit;
        }

        // You may want to add more validation here (e.g., username length, password strength)

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $result = $stmt->execute([$username, $email, $hashed_password]);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'User registered successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Registration failed']);
            }
        } catch(PDOException $e) {
            // Log the error server-side
            error_log('Registration error: ' . $e->getMessage());
            
            // Check for duplicate entry error
            if ($e->getCode() == '23000') {
                echo json_encode(['success' => false, 'message' => 'Username or email already exists']);
            } else {
                echo json_encode(['success' => false, 'message' => 'An error occurred during registration']);
            }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>