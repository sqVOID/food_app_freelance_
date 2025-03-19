<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$host = "localhost";  
$user = "root";       
$pass = "";           
$dbname = "food_app";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}


$data = json_decode(file_get_contents("php://input"));

if (!$data) {
    echo json_encode(["success" => false, "message" => "Invalid JSON"]);
    exit();
}

$stmt = $conn->prepare("INSERT INTO cart (name, category, price, quantity, image) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdis", $data->name, $data->category, $data->price, $data->quantity, $data->image);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Item added successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Database insert failed"]);
}

$stmt->close();
$conn->close();
?>
