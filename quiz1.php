<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h1>Take the Quiz</h1>
    <form action="quiz_index.php?action=viewResult" method="POST">
    
        <?php foreach ($questions as $index => $question): ?>
            <p><?= ($index + 1) . ". " . htmlspecialchars($question['question_text']) ?></p>
            <input type="radio" name="answers[<?= $index ?>]" value="4" required> A. Excellent<br>
            <input type="radio" name="answers[<?= $index ?>]" value="3"> B. Good<br>
            <input type="radio" name="answers[<?= $index ?>]" value="2"> C. Fair<br>
            <input type="radio" name="answers[<?= $index ?>]" value="1"> D. Poor<br>
        <?php endforeach; ?>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
