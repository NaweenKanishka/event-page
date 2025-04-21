<?php
$host = "localhost";
$user = "root"; // Change if needed
$password = ""; // Change if needed
$database = "new_event_db"; // Replace with your DB name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
