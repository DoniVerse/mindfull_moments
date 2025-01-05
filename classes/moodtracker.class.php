<?php


class MoodTracker extends Database {
    // Log a mood entry
    public function logMood($user_ID, $mood_score, $date) {
        $stmt = $this->connection->prepare("INSERT INTO mood_tracker (user_ID, mood_score, date) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $user_ID, $mood_score, $date);

        if ($stmt->execute()) {
            return ['status' => 'success', 'message' => 'Mood logged successfully!'];
        } else {
            return ['status' => 'error', 'message' => 'Failed to log mood.'];
        }
    }

    // Calculate average mood score
    public function calculateMood($user_ID) {
        $stmt = $this->connection->prepare("SELECT AVG(mood_score) AS average_mood FROM mood_tracker WHERE user_ID = ?");
        $stmt->bind_param("i", $user_ID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row ? ['status' => 'success', 'average_mood' => $row['average_mood']] : ['status' => 'error', 'message' => 'No records found.'];
    }
}
?>
