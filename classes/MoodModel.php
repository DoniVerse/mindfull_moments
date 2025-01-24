<?php
// app/models/MoodModel.php
require_once 'classes/database.class.php';

class MoodModel extends database {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }


    public function logMood($score) {
        if (is_numeric($score) && $score >= 1 && $score <= 10) {
            $stmt = $this->db->prepare("INSERT INTO moods (score) VALUES (?)");
            $stmt->bind_param('i', $score);
            $stmt->execute();
            $stmt->close();
    
            // Return custom mood message based on the score
            $message = $this->getMoodMessage($score);
            return $message;
        } else {
            return "Please enter a valid mood score between 1 and 10.";
        }
        //     $stmt = $this->db->prepare("INSERT INTO moods (score) VALUES (?)");
        //     $stmt->bind_param('i', $score);
        //     $stmt->execute();
        //     $stmt->close();
        //     return "Mood logged successfully!";
        // } else {
        //     return "Please enter a valid mood score between 1 and 10.";
        // }
    }

    public function calculateAverageMood() {
        $result = $this->db->query("SELECT AVG(score) as average FROM moods");
        $row = $result->fetch_assoc();
        return $row['average'] ?? "No mood scores logged yet.";
    }

    public function getAllMoods() {
        $result = $this->db->query("SELECT score FROM moods ORDER BY id DESC");
        $moods = [];
        while ($row = $result->fetch_assoc()) {
            $moods[] = $row['score'];
        }
        return $moods;
    }
    private function getMoodMessage($score) {
        // Define mood messages based on the score
        switch ($score) {
            case 1:
                return "You seem to be overly  anxious. Take a deep breath and relax .your mind must be your safe space";
            case 2:
                return "anger is natural. Overcome it and stay strong.";
            case 3:
                return "fear can paralize people ,you have to free yourself. Meditation  and exercise can help.";
            case 4:
                return "Fear is natural. Overcome it and stay strong.";
            case 5:
                return "Sadness can be overwhelming. Try to lift your spirits.";
            case 6:
                return "somedays the world can be a Meh and an ehhhh and make your day brighter by eating a delicious food.";
            case 7:
                return "sometimes we arent strong but strengs finds us when we need it the most.so dont be bitter and angry it will pass.";
            case 8:
                return "You’re joyful and happy—just like you deserve!";
            case 9:
                return " you are in the perfect safespace ,channel your energy and Get some sleep. A rested mind is a happy mind.";
            case 10:
                return "Every day is a new day. Embrace it with positivity!";
            default:
                return "Mood logged successfully!";
        }
    }
    public function clearMoodHistory() {
        $stmt = $this->db->prepare("DELETE FROM moods");
        $stmt->execute();
        $stmt->close();
    }
}
?>
