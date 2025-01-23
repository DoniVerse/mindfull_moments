<?php
require_once 'C:\Program Files\Ampps\www\mindfull_moments\controller\JournalController.php';

// require_once 'controller/JournalController.php';


$controller = new JournalController();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entry'])) {
    $controller->addEntry($_POST['entry']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


if (isset($_GET['delete'])) {
    $controller->deleteEntry((int)$_GET['delete']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


$entries = $controller->getAllEntries();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Journal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/indexjornal.css">
    
</head>
<body>
    <header>
        <h1>My Journal</h1>
        <a href="dashboard.php" class="back-button">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>
    </header>
    <style>
       
    </style>

    <form method="POST" id="journal-form">
        <textarea name="entry" placeholder="Write your journal entry here..." required></textarea>
        <button type="submit" class="done-button">Done</button>
    </form>

    <div class="entry-container">
        <?php
        if ($entries->num_rows > 0) {
            while ($row = $entries->fetch_assoc()) {
                $short_entry = htmlspecialchars(substr($row['entry'], 0, 200)) . (strlen($row['entry']) > 200 ? '...' : '');
                echo "<div class='entry-box' onclick='openModal(\"" . htmlspecialchars($row['entry']) . "\")'><div class='entry-content'><strong>" . htmlspecialchars($row['created_at']) . ":</strong> " . $short_entry . "</div> <a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></div>";
            }
        } else {
            echo "<div class='entry-box'>You have no entries yet. Start now.</div>";
        }
        ?>
    </div>

    <button class="add-button" onclick="toggleForm()"><i class="fas fa-plus"></i></button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Journal Entry</h2>
            <p id="modalText"></p>
        </div>
    </div>

    <script>
        function toggleForm() {
            const form = document.getElementById('journal-form');
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'flex' : 'none';
        }

        function openModal(entry) {
            document.getElementById('modalText').innerText = entry;
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

