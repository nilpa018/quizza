<?php
require_once 'config.php';
$questionId = $_POST['update_Id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = strtolower($_POST['category']);
    $level = $_POST['level'];
    $question = $_POST['question'];
    $options = $_POST['options'];
    $correctAnswer = $_POST['correctAnswer'];

    $sql = "UPDATE `questions` SET question=?, options=?, correctAnswer=?, level=?, category=? WHERE questions.question_id = $questionId;";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('sssss', $question, $options, $correctAnswer, $level, $category);
        if ($stmt->execute()) {
            header('location: ./index.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}
