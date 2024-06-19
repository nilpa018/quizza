<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizId =(int) $_POST['quizId'];
    $title = $_POST['quizName'];
    $questionsId = array_map('intval',$_POST['questions']);


    $sql = "UPDATE quiz
    SET title= ? 
    WHERE quiz_id = $quizId;";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('s',$title); 
        if ($stmt->execute()) {
            header('location: quizzes.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }

    // insérer les liaisons des questions en lien au quizz
    $sql2= "INSERT INTO quiz_questions(question_id)
    VALUE (";
    
    $placeholders = array_fill(0, count($questionsId), ' ?'); 
    $sql2 .= implode(',', $placeholders);
    $sql2 .= ")";

    $stmt = $conn->prepare($sql2);
    if ($stmt) {
        $stmt->bind_param('si' . str_repeat('i', count($questionsId)), ...$questionsId); 
        if ($stmt->execute()) {
            header('location: quizzes.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}
