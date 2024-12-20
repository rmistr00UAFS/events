<?php

// Set CORS headers
header("Access-Control-Allow-Origin: *"); // Allow all origins (change this to a specific origin if needed)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Allowed methods
header("Access-Control-Allow-Headers: Content-Type"); // Allowed headers
header("Content-Type: application/json"); // Return JSON response

// Get the JSON input
$dataIN = json_decode(file_get_contents('php://input'), true);

// echo json_encode($dataIN);

// // Ensure the input is valid
// if (!isset($dataIN['title']) || !isset($dataIN['info']) || !isset($dataIN['date']) || !isset($dataIN['time']) || !isset($dataIN['address']) || !isset($dataIN['coordinates']) || !isset($dataIN['categoryid']) || !isset($dataIN['organizerid'])) {
//     echo json_encode(["error" => "All fields (title, info, date, time, address, coordinates, categoryid, organizerid) are required."]);
//     exit;
// }


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

$conn = new mysqli($host, $username, $password_db, $dbname);



// Prepare and execute the insert query
$stmt = $conn->prepare("INSERT INTO `EVENT` (`TITLE`, `INFO`, `DATE`, `TIME`, `ADDRESS`, `COORDINATES`, `CATEGORYID`, `USERID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssii", $title, $info, $date, $time, $address, $coordinates, $categoryid, $userid);


if ($stmt->execute()) {
    echo json_encode(["message" => "Event created successfully."]);
} else {
    echo json_encode(["error" => "Error creating event: " . $stmt->error]);
}


$stmt->close();
$conn->close();
?>

