<?php
require_once 'config.php';

$questionId = isset($_POST['questionId']) ? $_POST['questionId'] : null;
$userAnswer = isset($_POST['answer']) ? $_POST['answer'] : null;

$response = ['correct' => false, 'error' => ''];

if ($questionId !== null && $userAnswer !== null) {
    $sql = $conn->prepare("SELECT correctAnswer FROM questions WHERE question_id = ?");
    $sql->bind_param("i", $questionId);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['correctAnswer'] == $userAnswer) {
            $response['correct'] = true;
        }
    } else {
        $response['error'] = 'Question not found';
    }
} else {
    $response['error'] = 'Invalid input';
}

header('Content-Type: application/json');
echo json_encode($response);
