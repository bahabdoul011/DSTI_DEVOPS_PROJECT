<?php
header('Content-Type: application/json');
// Include necessary files

include("Connexion/database.php");

function healthCheck() {
    global $pdo;

    try {
        // Check if the database connection is active
        $stmt = $pdo->query("SELECT 1");
        
        if ($stmt) {
            // echo "Database connection successful.";
            return json_encode(["success" => true, "status" => "ok", "message" => "The database is accessible."]);
        }
    } catch (PDOException $e) {
        // If the connection fails, show the error
        return json_encode(["success" => false, "status" => "fail", "message" => "Database connection error: " . $e->getMessage()]);
    }
}

echo healthCheck();
