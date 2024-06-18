<?php
require_once 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $id = $_POST['quizId'];
    $title = $_POST['quizName'];
    $questionsId = array_map('intval',$_POST['questions']);
    var_dump($questionsId);

    $sql = "UPDATE quiz
    JOIN quiz_questions AS qq ON qq.quiz_id = quiz.quiz_id
    SET title= ?, 
    WHERE quiz.quiz_id = ? AND qq.question_id IN (";

    $placeholders = array_fill(0, count($questionsId), '?'); 
    $sql .= implode(',', $placeholders);
    $sql .= ")";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $bind_params = array_merge([$title, $id], $questionsId); 
        $stmt->bind_param('si' . str_repeat('i', count($questionsId)), ...$bind_params); 
        
        if ($stmt->execute()) {
            header('location: quizzes.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}
