<?php
require_once 'classes/quizmodel.php';

class quizcontroller {
    private $quizModel;

    public function __construct($db) {
        $this->quizModel = new QuizModel($db);
    }

    public function takeQuiz() {
        $questions = $this->quizModel->getQuestions();
        require 'views/quiz.php';
    }

    public function viewResult() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answers'])) {
            $answers = array_map('intval', $_POST['answers']);
            $result = $this->quizModel->calculateResult($answers);
            require 'views/result.php';
        } else {
            header("Location: quiz_index.php");
            exit();
        }
    }
}
?>
