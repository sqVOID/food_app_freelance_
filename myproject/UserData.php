<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include 'db_connect.php'; 

$imageBaseURL = "http://192.168.18.13/myproject/assets/";

$sql = "SELECT username, lastname, phoneNumber, profileImage, points FROM users WHERE id = 1"; // Change ID if needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $row['profileImage'] = $imageBaseURL . $row['profileImage'];
    echo json_encode($row);
} else {
    echo json_encode(["message" => "No user found"]);
}

$conn->close();
?>
