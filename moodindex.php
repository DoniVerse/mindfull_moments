<?php
// index.php
require_once 'controller/MoodController.php';

$moodController = new MoodController();
$message = "";
$averageMood = "";
$moods = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mood'])) {
    $score = (int) $_POST['mood'];
    $message = $moodController->logMood($score);
    $averageMood = $moodController->calculateAverageMood();
    $moods = $moodController->getAllMoods();
} else {
    $averageMood = $moodController->calculateAverageMood();
    $moods = $moodController->getAllMoods();
}
if (isset($_POST['clear_history'])) {
    $moodController->clearMoodHistory();
    $message = "Mood history cleared successfully!";
    $averageMood = "No mood scores logged yet.";
    $moods = [];
} else {
    $averageMood = $moodController->calculateAverageMood();
    $moods = $moodController->getAllMoods();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
</head>
<body style="background : linear-gradient(to bottom, #89A8B2, #B3C8CF, #E5E1DA,#89A8B2); transition: background 1s ease;">
    <h1>Mood Tracker</h1>
    <form method="POST" action="">
        <label for="mood">Enter your mood (1-10):</label>
        <input type="number" id="mood" name="mood" min="1" max="10" required>
        <button type="submit">Log Mood</button>
    </form>
    
   

    <p class="message" id="moodMessage"><?php echo htmlspecialchars($message); ?></p>
    <div class="averageMood" id="averageMood">

    <h2>Average Mood</h2>
    <p  id="averageScore"><?php echo is_numeric($averageMood) ? "Your average mood is: " . round($averageMood, 2) : $averageMood; ?></p>
      </div>
      <div class="loggedMoods" id="loggedMoods">

    <h2>Logged Mood Scores</h2>
    <ul>
        <?php foreach ($moods as $mood): ?>
            <li><?php echo htmlspecialchars($mood); ?></li>
        <?php endforeach; ?>
    </ul>
    </div>
    <form method="POST" action="">
    <button type="submit" name="clear_history">Clear Mood History</button>
</form>
<!-- <button id="changeBackgroundBtn">Change Background</button> -->

<script>
    
     // Function to handle animations
     document.addEventListener("DOMContentLoaded", () => {
            const moodMessage = document.getElementById('moodMessage');
            const averageMoodSection = document.getElementById('averageMood');
            const loggedMoodsSection = document.getElementById('loggedMoods');

            // Check if the message exists and trigger animations
            if (moodMessage.textContent.trim() !== "") {
                document.body.classList.add('background-animate'); // Start background animation

                // Show the mood message with animation
                setTimeout(() => {
                    moodMessage.classList.add('visible');
                }, 500);

                // Show the average mood after the message
                setTimeout(() => {
                    averageMoodSection.classList.add('slideDown');
                }, 1500);

                // Show the logged moods after the average mood
                setTimeout(() => {
                    loggedMoodsSection.classList.add('slideDown');
                }, 2500);
            }
        });
</script>
<style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, #89A8B2, #B3C8CF, #E5E1DA, #89A8B2);
            transition: background 1s ease;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #2c3e50;
        }

        form {
            margin-bottom: 20px;
        }

        /* Mood message styling */
        .message {
            font-size: 28px;
            color:rgb(243, 89, 18);
            font-weight: bold;
            text-align: center;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .message.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Sections: Average Mood and Logged Moods */
        .averageMood, .loggedMoods {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .averageMood.slideDown, .loggedMoods.slideDown {
            opacity: 1;
            transform: translateY(0);
        }

        /* Styling for headers and text */
        .averageMood h2, .loggedMoods h2 {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }

        .averageMood p, .loggedMoods ul {
            font-size: 20px;
            color: #34495e;
        }

        .loggedMoods ul {
            list-style-type: none;
            padding-left: 0;
        }

        .loggedMoods li {
            margin: 5px 0;
        }

        /* Background animation */
        @keyframes backgroundLoop {
            0% {
                background: linear-gradient(to bottom,rgb(109, 161, 206), #A1BCC7,rgb(60, 97, 122), #C1D3E3);
            }
            25% {
                background: linear-gradient(to bottom,rgb(109, 161, 206), #A1BCC7,rgb(60, 97, 122), #C1D3E3);
            }
            50% {
                background: linear-gradient(to bottom,rgb(109, 161, 206), #A1BCC7,rgb(60, 97, 122),#C1D3E3);
            }
            75% {
                background: linear-gradient(to bottom,rgb(109, 161, 206), #A1BCC7,rgb(60, 97, 122), #C1D3E3);
            }
            100% {
                background: linear-gradient(to bottom, #89A8B2, #B3C8CF, #E5E1DA, #89A8B2);
            }
        }

        .background-animate {
            animation: backgroundLoop 10s infinite ease-in-out;
        }
    </style>
</body>
</html>

    