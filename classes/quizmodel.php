<?php
require_once'classes/database.class.php';
class   quizmodel extends database {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getQuestions() {
        $query = "SELECT * FROM questions LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateResult($answers) {
        $totalScore = array_sum($answers);
        $feedback = '';

        if ($totalScore >= 36) {
            $feedback = "You're doing great! Keep it up.";
        } elseif ($totalScore >= 30) {
            $feedback = "You're doing okay, but there's room for improvement.";
        } elseif ($totalScore >= 20) {
            $feedback = "It seems like you're struggling. Take time to focus on your mental health.";
        } else {
            $feedback = "You're having a tough time. Please seek help if needed.";
        }

        return [
            'totalScore' => $totalScore,
            'feedback' => $feedback
        ];
    }
}
?>
