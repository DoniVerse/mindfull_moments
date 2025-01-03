<?php
;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_ID = isset($_POST['user_ID']) ? $_POST['user_ID'] : null;
    $mood_score = isset($_POST['mood_score']) ? $_POST['mood_score'] : null;
    $date = isset($_POST['date']) ? $_POST['date'] : null;

    if ($user_ID && $mood_score && $date) {
        $moodTracker = new MoodTracker();
        $response = $moodTracker->logMood($user_ID, $mood_score, $date);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logmood</title>
</head>
<body>
<h1>Mood Tracker</h1>

<!-- Log Mood -->
<h2>Log Mood</h2>
<form id="logMoodForm">
    <input type="hidden" name="user_ID" value="1">
    <label for="mood_score">Mood Score (1-10):</label>
    <input type="number" id="mood_score" name="mood_score" min="1" max="10" required>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>
    <button type="submit">Log Mood</button>
</form>

<!-- Calculate Average Mood -->
<h2>Calculate Average Mood</h2>
<button id="calculateMood">Get Average Mood</button>
<p id="averageMood"></p>

<script>
    const logMoodForm = document.getElementById('logMoodForm');
    const calculateMoodButton = document.getElementById('calculateMood');
    const averageMoodDisplay = document.getElementById('averageMood');

    // Log Mood
    logMoodForm.addEventListener('submit', async (e) => {
e.preventDefault();
const formData = new FormData(logMoodForm);
const response = await fetch('logMood.php', { method: 'POST', body: formData });
const result = await response.json();
alert(result.message);
});

    // Calculate Average Mood
    calculateMoodButton.addEventListener('click', async () => {
        const response = await fetch('calculateMood.php?user_ID=1');
        const result = await response.json();
        if (result.status === 'success') {
            averageMoodDisplay.textContent = `Average Mood Score: ${result.average_mood}`;
        } else {
            alert(result.message);
        }
    });
</script>
</body>
</html>
