<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['quizName'];
    $questionsId = array_map('intval',$_POST['questions']);
    var_dump($questionsId);

    $sql1 = "INSERT INTO quiz (title)
    VALUE (?) 
    ";

    $stmt = $conn->prepare($sql1);
    if ($stmt) {
        $stmt->bind_param('s',$title); 
        if ($stmt->execute()) {
            echo "nom de quizz mis à jour";
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        };
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }

    // $quizId = mysqli_insert_id($conn);
    $sql2= "INSERT INTO quiz_questions (quiz_id,question_id)
    VALUES 
    " ;
    $placeholders = array_fill(0,count($questionsId), ' (LAST_INSERT_ID(),?)');
    $sql2.= implode(',', $placeholders);
  
  
    $stmt = $conn->prepare($sql2);
    if ($stmt) {
            $stmt->bind_param(str_repeat('i', count($questionsId)), ...$questionsId); 
            if ($stmt->execute()) {
                header('location: quizzes.php');
            } else {
                echo "Erreur : " . $sql . "<br>" . $stmt->error;
            };
        } else {
            echo "Erreur lors de la préparation de la requête : " . $conn->error;
        }
    
    }
