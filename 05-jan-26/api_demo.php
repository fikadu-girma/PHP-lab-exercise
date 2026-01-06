<?php
header("Content-Type: application/json");

// Simple in-memory data (normally this would come from a database)
$users = [
    ["id" => 1, "name" => "John Doe"],
    ["id" => 2, "name" => "Jane Smith"]
];

// Get HTTP method
$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {

    // ---------- GET /api_demo.php ----------
    // Returns all users
    case "GET":
        echo json_encode([
            "status" => "success",
            "data" => $users
        ]);
        break;


    // ---------- POST /api_demo.php ----------
    // Accepts JSON body and returns created user
    case "POST":
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input["name"])) {
            echo json_encode([
                "status" => "error",
                "message" => "Name field is required"
            ]);
            http_response_code(400);
            break;
        }

        $newUser = [
            "id" => count($users) + 1,
            "name" => $input["name"]
        ];

        echo json_encode([
            "status" => "created",
            "data" => $newUser
        ]);
        break;


    // ---------- Unsupported Method ----------
    default:
        echo json_encode([
            "status" => "error",
            "message" => "Method not allowed"
        ]);
        http_response_code(405);
}
