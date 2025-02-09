<?php
header("Access-Control-Allow-Origin: *"); // Allows requests from any origin
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Specifies allowed HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); 
header('Content-Type: application/json'); // Set response type to JSON
include("database.php"); // Ensure database connection and functions are included

try {
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["success" => false, "status" => "fail", "message" => "Invalid request method."]);
        exit;
    }

    // Retrieve the engineer ID and input data
    $input = json_decode(file_get_contents("php://input"), true);

    // Support both raw JSON and form data
    $input = !empty($_POST) ? $_POST : $input;

    if (!isset($input['id'])) {
        echo json_encode(["success" => false, "status" => "fail", "message" => "Missing or invalid input parameters."]);
        exit;
    }   

    $id = $input['id'];
    $data = $input;

    // Call the updateEngineer function
    $response = updateEngineer($id, $data);

    // Return JSON response
    echo $response;
} catch (Exception $e) {
    echo json_encode(["success" => false, "status" => "error", "message" => "Server error: " . $e->getMessage()]);
}
?>
