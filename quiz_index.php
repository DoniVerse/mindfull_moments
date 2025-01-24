<?php
session_start();
require_once 'db.php';
require_once 'controllers/quizcontrollers.php';

$database = new Database();
$db = $database->connect();

$controller = new QuizController($db);

$action = $_GET['action'] ?? 'takeQuiz';

if ($action === 'viewResult') {
    $controller->viewResult();
} else {
    $controller->takeQuiz();
}
?>
