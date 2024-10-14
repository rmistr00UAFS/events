<?php

// Set CORS headers
header("Access-Control-Allow-Origin: *"); // Allow all origins (change this to a specific origin if needed)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Allowed methods
header("Access-Control-Allow-Headers: Content-Type"); // Allowed headers
header("Content-Type: application/json"); // Return JSON response

// Get the JSON input
$dataIN = json_decode(file_get_contents('php://input'), true);

// echo json_encode($dataIN);



$eventid = intval($dataIN['eventid']);
$title = strval($dataIN['title']);
$info = strval($dataIN['info']);
$date = strval($dataIN['date']);
$time = strval($dataIN['time']);
$address = strval($dataIN['address']);
$coordinates = strval($dataIN['coordinates']);
$categoryid = intval($dataIN['categoryid']);
$userid = intval($dataIN['userid']);



$host = 'localhost'; // Database host
$username = 'pmaUser'; // Database username
$password_db = 'pma'; // Database password
$dbname = 'event_app_db'; // Database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password_db, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
// }
//
// // Check if the email already exists
// $stmt = $conn->prepare("SELECT * FROM `EVENT` WHERE `TITLE` = ?");
// $stmt->bind_param("s", $title);
// $stmt->execute();
// $result = $stmt->get_result();
/*
if ($result->num_rows > 0) {
    echo json_encode(["error" => "Event already exists."]);
    exit;
}*/


$stmt = $conn->prepare("UPDATE `EVENT` SET `TITLE` = ?, `INFO` = ?, `DATE` = ?, `TIME` = ?, `ADDRESS` = ?, `COORDINATES` = ?, `CATEGORYID` = ?, `USERID` = ? WHERE `EVENTID` = ?");
$stmt->bind_param("ssssssiii", $title, $info, $date, $time, $address, $coordinates, $categoryid, $userid, $eventid);


if ($stmt->execute()) {
    echo json_encode(["message" => "Event updated successfully."]);
} else {
    echo json_encode(["error" => "Error updating event: " . $stmt->error]);
}


$stmt->close();
$conn->close();
?>

