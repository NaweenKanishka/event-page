<?php
include 'db.php'; // Include your database connection

// SQL query to get events ordered by date
$sql = "SELECT * FROM events ORDER BY datetime ASC";
$result = $conn->query($sql);

// Array to store event data
$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            "id" => $row["id"],
            "topic" => $row["topic"],
            "datetime" => $row["datetime"],
            "location" => $row["location"],
            "google_map_link" => $row["google_map_link"],
            "organizers" => $row["organizers"],
            "description" => $row["description"]
        ];
    }
}

// Return as JSON
header('Content-Type: application/json');
echo json_encode($events, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$conn->close();
