<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $table = $_POST['table'];
        $video = $_POST['video'] ?? null;
        
        $stmt = $conn->prepare("INSERT INTO $table (video) VALUES (?)");
        if ($stmt) {
            $stmt->bind_param("s", $video);
            if ($stmt->execute()) {
                
                $stmt->close();
            } else {
                echo "Error adding video: " . $stmt->error;
            }
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } elseif ($_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $table = $_POST['table'];
        
        $stmt = $conn->prepare("DELETE FROM $table WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                echo "Error deleting video: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
}

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
    <title>Manage Exercise Videos</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .column {
            width: 30%;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Manage Exercise Videos</h1>
    <div class="container">
        <div class="column">
            <h2>Yoga</h2>
            <form method="POST">
                <input type="text" name="video" placeholder="Yoga Video URL" required>
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="table" value="yoga">
                <button type="submit">Add Yoga Video</button>
            </form>
            <h3>Existing Videos</h3>
            <ul>
                <?php foreach ($yogaVideos as $video): ?>
                    <li>
                        <video width="320" height="240" controls>
                            <source src="<?php echo htmlspecialchars($video['video']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="table" value="yoga">
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="column">
            <h2>Meditation</h2>
            <form method="POST">
                <input type="text" name="video" placeholder="Meditation Video URL" required>
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="table" value="meditation">
                <button type="submit">Add Meditation Video</button>
            </form>
            <h3>Existing Videos</h3>
            <ul>
                <?php foreach ($meditationVideos as $video): ?>
                    <li>
                        <video width="320" height="240" controls>
                            <source src="<?php echo htmlspecialchars($video['video']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="table" value="meditation">
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="column">
            <h2>Pilates</h2>
            <form method="POST">
                <input type="text" name="video" placeholder="Pilates Video URL" required>
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="table" value="pilates">
                <button type="submit">Add Pilates Video</button>
            </form>
            <h3>Existing Videos</h3>
            <ul>
                <?php foreach ($pilatesVideos as $video): ?>
                    <li>
                        <video width="320" height="240" controls>
                            <source src="<?php echo htmlspecialchars($video['video']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="table" value="pilates">
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
