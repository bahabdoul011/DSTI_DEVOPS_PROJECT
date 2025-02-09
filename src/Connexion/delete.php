<?php
header('Content-Type: application/json'); // Set response type to JSON
include("database.php"); // Ensure database connection and functions are included
$input = json_decode(file_get_contents("php://input"), true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($input['id']) ? intval($input['id']) : null;
    echo deleteEngineer($id);
} else {
    echo json_encode(["success" => false, "status" => "fail", "message" => "Invalid request."]);
}

?>