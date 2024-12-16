<?php
// Database connection
$host = 'localhost';
$db = 'journal_db';
$user = 'root'; // Default user for Laragon
$pass = ''; // Default password is usually empty for Laragon

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for adding entry
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entry'])) {
    $entry = $_POST['entry'];
    
    // Insert the journal entry into the database
    $stmt = $conn->prepare("INSERT INTO journals (entry) VALUES (?)");
    $stmt->bind_param("s", $entry);
    $stmt->execute();
    $stmt->close();

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle deletion of an entry
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    // Delete the journal entry from the database
    $stmt = $conn->prepare("DELETE FROM journals WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the same page after deletion
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch previous entries
$result = $conn->query("SELECT * FROM journals ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Journal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="stylesheet" href="journal.css">
</head>
<body>
    <header>
        <h1>My Journal</h1>
    </header>

    <form method="POST" id="journal-form">
        <textarea name="entry" placeholder="Write your journal entry here..." required></textarea>
        <button type="submit" class="done-button">Done</button>
    </form>

    <div class="entry-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Limit the displayed entry to the first 100 characters
                $short_entry = htmlspecialchars(substr($row['entry'], 0, 100)) . (strlen($row['entry']) > 100 ? '...' : '');
                echo "<div class='entry-box' onclick='openModal(\"" . htmlspecialchars($row['entry']) . "\")'><div class='entry-content'><strong>" . htmlspecialchars($row['created_at']) . ":</strong> " . $short_entry . "</div> <a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></div>";
            }
        } else {
            echo "<div class='entry-box'>you have no entries yet start now.</div>";
        }
        ?>
    </div>

    <button class="add-button" onclick="toggleForm()"><i class="fas fa-plus"></i></button>

    <!-- Modal -->
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

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <?php $conn->close(); ?>
</body>
</html>