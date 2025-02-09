<?php
header('Content-Type: application/json'); // Set response type to JSON
include("database.php"); // Ensure database connection and functions are included

try {
    // Vérifier si la requête est bien en POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["success" => false, "status" => "fail", "message" => "Invalid request method."]);
        exit;
    }

    // Récupérer l'ID de l'ingénieur et les données envoyées
    $input = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($input['id'])) {
        echo json_encode(["success" => false, "status" => "fail", "message" => "Missing or invalid input parameters."]);
        exit;
    }

    $id = $input['id'];
    $data = $input;

    // Appel de la fonction updateEngineer
    $response = updateEngineer($id, $data);

    // Retourner la réponse JSON
    echo $response;
} catch (Exception $e) {
    echo json_encode(["success" => false, "status" => "error", "message" => "Server error: " . $e->getMessage()]);
}


?>