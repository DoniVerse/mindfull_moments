<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Your Results</h1>
    <p>Your total score: <?= $result['totalScore'] ?></p>
    <p><?= htmlspecialchars($result['feedback']) ?></p>
    <a href="quiz_index.php">Take Quiz Again</a>
</body>
</html>
