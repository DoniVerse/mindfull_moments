<?php
// app/controllers/MoodController.php
require_once 'MoodModel.php';

class MoodController {
    private $moodModel;

    public function __construct() {
        $this->moodModel = new MoodModel();
    }

    public function logMood($score) {
        return $this->moodModel->logMood($score);
    }

    public function calculateAverageMood() {
        return $this->moodModel->calculateAverageMood();
    }

    public function getAllMoods() {
        return $this->moodModel->getAllMoods();
    }
    public function clearMoodHistory() {
        return $this->moodModel->clearMoodHistory();
    }
}
?>
