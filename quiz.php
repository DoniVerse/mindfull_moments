<?php
session_start(); // Start the session

$servername = "localhost"; // Change if necessary
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "user_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$totalScore = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 0; $i < 10; $i++) {
        if (isset($_POST["response$i"])) {
            $totalScore += (int)$_POST["response$i"];
        }
    }

    // Insert result into the database
    $stmt = $conn->prepare("INSERT INTO quizresults (total_score) VALUES (?)");
    $stmt->bind_param("i", $totalScore);
    
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }
    $stmt->close();

    // Store the score in the session and mark the quiz as completed
    $_SESSION['score'] = $totalScore;
    $_SESSION['quiz_completed'] = true;
}

// Check if the quiz is completed
$isQuizCompleted = isset($_SESSION['quiz_completed']) && $_SESSION['quiz_completed'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Questionnaire</title>
    <link rel="stylesheet" href="quiz.css">
    
</head>
<body>
    <div class="container">
        <h1>Mental Health Questionnaire</h1>
        <?php if ($isQuizCompleted): ?>
            <div id="result-container">
                <h2>Your Quiz Results</h2>
                <p>Thank you for completing the Mental Health Questionnaire!</p>
                <p>Your total score is: <strong><?php echo $_SESSION['score']; ?></strong></p>
                <?php
                // Interpretation of the score
                if ($_SESSION['score'] >= 36) {
                    echo "<p>You're doing great! Keep up the positive habits.</p>";
                } elseif ($_SESSION['score'] >= 30) {
                    echo "<p>You're doing okay, but there's room for improvement.</p>";
                } elseif ($_SESSION['score'] >= 20) {
                    echo "<p>It seems like you're struggling in some areas.</p>";
                } else {
                    echo "<p>Your responses indicate you're having a tough time.</p>";
                }
                ?>
                <form method="POST">
                    <button type="submit" name="reset">Take the Quiz Again</button>
                </form>
            </div>
        <?php else: ?>
            <form method="POST" id="quiz-form">
                <?php
                $questions = [
                    "How would you rate your overall mental health?",
                    "Do you often experience feelings of sadness or hopelessness?",
                    "How well do you cope with stress in your daily life?",
                    "Have you ever sought professional help for mental health concerns?",
                    "Do you engage in regular physical activity or exercise?",
                    "How well do you sleep at night?",
                    "Have you ever experienced panic attacks or severe anxiety?",
                    "How often do you engage in activities that you enjoy and find fulfilling?",
                    "Are you satisfied with your relationships and social connections?",
                    "Do you have a strong support system of friends and family?"
                ];

                foreach ($questions as $index => $question) {
                    echo "<div class='question'>";
                    echo "<label>$question</label><br>";
                    echo "<input type='radio' name='response$index' value='4'>A. Excellent<br>";
                    echo "<input type='radio' name='response$index' value='3'>B. Good<br>";
                    echo "<input type='radio' name='response$index' value='2'>C. Fair<br>";
                    echo "<input type='radio' name='response$index' value='1'>D. Poor<br><br>";
                    echo "</div>";
                }
                ?>
                <button type="submit">Submit</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Reset the session if the reset button is clicked
if (isset($_POST['reset'])) {
    session_destroy(); // Clear the session
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}
?>