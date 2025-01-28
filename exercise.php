<?php
include 'db_connection.php';

$yogaVideos = [];
$meditationVideos = [];
$pilatesVideos = [];

$yogaResult = $conn->query("SELECT * FROM yoga");
while ($row = $yogaResult->fetch_assoc()) {
    $yogaVideos[] = $row;
}

$meditationResult = $conn->query("SELECT * FROM meditation");
while ($row = $meditationResult->fetch_assoc()) {
    $meditationVideos[] = $row;
}

$pilatesResult = $conn->query("SELECT * FROM pilates");
while ($row = $pilatesResult->fetch_assoc()) {
    $pilatesVideos[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Videos</title>
    <link rel="stylesheet" href="exercise1.css">
</head>
<body>
<div class="container">

    <div class="container">
        <div class="column">
            <h2>Yoga</h2>
            <ul>
                <?php foreach ($yogaVideos as $video): ?>
                    <li>
                        <video width="320" height="240" controls>
                            <source src="<?php echo htmlspecialchars($video['video']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="column">
            <h2>Meditation</h2>
            <ul>
                <?php foreach ($meditationVideos as $video): ?>
                    <li>
                        <video width="320" height="240" controls>
                            <source src="<?php echo htmlspecialchars($video['video']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="column">
            <h2>Pilates</h2>
            <ul>
                <?php foreach ($pilatesVideos as $video): ?>
                    <li>
                        <video width="320" height="240" controls>
                            <source src="<?php echo htmlspecialchars($video['video']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
