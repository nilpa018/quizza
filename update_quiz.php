<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizId =(int) $_POST['quizId'];
    $title = $_POST['quizName'];
    $questionsId = array_map('intval',$_POST['questions']);

    // mise à jour du nom du quizz
    $sql = "UPDATE quiz
    SET title= ? 
    WHERE quiz_id = $quizId;";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('s',$title); 
        if ($stmt->execute()) {
           echo"nom  mis à jour";
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }

    // mise à jour des questions
    // suppression des questions
    $sql1="DELETE FROM quiz_questions
    WHERE quiz_id = $quizId";
    if($conn->query($sql1) === true){
            // insérer les liaisons des questions en lien au quizz
        $sql2= "INSERT INTO quiz_questions(quiz_id,question_id)
        VALUES";  
        $placeholders = array_fill(0, count($questionsId), '('.$quizId.',?)'); 
        $sql2 .= implode(',', $placeholders);

        $stmt = $conn->prepare($sql2);
        if ($stmt) {
            $stmt->bind_param( str_repeat('i', count($questionsId)), ...$questionsId); 
            if ($stmt->execute()) {
                header('location: quizzes.php');
            } else {
                echo "Erreur : " . $sql . "<br>" . $stmt->error;
            };
        } else {
            echo "Erreur lors de la préparation de la requête : " . $conn->error;
        }
    }
    else{echo "error".$sql1."<br>".$conn->error;}
    
   
}
