<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = strtolower($_POST['category']);
    $level = $_POST['level'];
    $question = $_POST['question'];
    $options = $_POST['options'];
    $correctAnswer = $_POST['correctAnswer'];

    $sql = "INSERT INTO `questions` (`question`, `options`, `correctAnswer`, `level`, `category`) VALUES (?,?,?,?,?);";
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
