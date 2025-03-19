<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_app";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}


$sql = "SELECT * FROM popular_items";
$result = $conn->query($sql);

$items = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $imageBaseURL = "http://192.168.18.13/myproject/assets/";  
        $row["image"] = $imageBaseURL . basename($row["image"]);

 
        $row["price"] = (float) $row["price"];

        $items[] = $row;
    }
}



echo json_encode($items, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
$conn->close();
?>
