<!-- event-detail.php -->
<?php
include 'db.php';

if (!isset($_GET['id'])) {
    echo "Event ID not specified.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM events WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();

if (!$event) {
    echo "Event not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="og:title" content="<?= htmlspecialchars($event['topic']) ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($event['description']) ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= 'https://yourwebsite.com/event-detail.php?id=' . $id ?>" />
    <meta property="og:image" content="https://yourwebsite.com/preview.jpg" />
    <title><?= htmlspecialchars($event['topic']) ?></title>
</head>
<body>
    <div class="event-detail">
        <h1><?= htmlspecialchars($event['topic']) ?></h1>
        <p><strong>Date:</strong> <?= date("F j, Y, g:i a", strtotime($event['datetime'])) ?></p>
        <p><strong>Location:</strong> <?= htmlspecialchars($event['location']) ?></p>
        <p><strong>Organizers:</strong> <?= htmlspecialchars($event['organizers']) ?></p>
        <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
        <p><a href="<?= htmlspecialchars($event['google_map_link']) ?>" target="_blank">View on Google Maps</a></p>
    </div>
</body>
</html>
