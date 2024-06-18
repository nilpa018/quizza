<?php
require_once 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $id = $_POST['quizId'];
    $title = $_POST['quizName'];
    $questions = $_POST['questions'];
    var_dump($questions);

    $sql = "UPDATE quiz
    JOIN quiz_questions AS qq ON qq.quiz_id = quiz.quiz_id
    SET title= ?
    WHERE quiz.quiz_id = ?;";
    // , quiz_questions.question_id=?
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('si',$title, $id);
        if ($stmt->execute()) {
            header('location: quizzes.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}
