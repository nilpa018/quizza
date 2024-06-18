<?php
require_once 'config.php';
$questionId = $_POST['delete_Id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM `questions` WHERE `questions`.`question_id` = $questionId";
    $result = $conn->query($sql);
    if ($result) {
        header('location: ./questions.php');
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    };
} else {
    echo "Erreur lors de la préparation de la requête : " . $conn->error;
}
