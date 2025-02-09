<?php
// Allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Allows requests from any origin
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Specifies allowed HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Specifies allowed headers
header('Content-Type: application/json'); // Set response type to JSON
include("database.php"); // Ensure database connection and functions are included
$input = json_decode(file_get_contents("php://input"), true);

$test_post_id = !empty($_POST['id'])?$_POST['id']:null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($input['id']) ? intval($input['id']) : $test_post_id ;
    echo deleteEngineer($id);
} else {
    echo json_encode(["success" => false, "status" => "fail", "message" => "Invalid request."]);
}

?>