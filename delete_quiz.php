<?php
require_once 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Récupération de l'Id du quizz à supprimer dans input
    $id = $_POST['userId'];
    $sql = 'DELETE FROM quiz
    WHERE quiz_id = $id';
    
    if($conn->query($sql) === true){
        echo "Quizz deleted!";
    }
    else{
        echo "error".$sql."<br>".$conn->error;
    }

}