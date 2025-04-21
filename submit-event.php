<?php
include 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $topic = $_POST['topic'];
    $datetime = $_POST['datetime'];
    $location = $_POST['location'];
    $googleMapLink = $_POST['location-googlemap-link'];
    $organizers = $_POST['organizers'];
    $description = $_POST['description'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO events (topic, datetime, location, google_map_link, organizers, description)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $topic, $datetime, $location, $googleMapLink, $organizers, $description);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
