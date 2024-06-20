<?php
require_once 'config.php';

$id = $_POST['quizId'];

$sql = "SELECT title , questions.question_id, question, options, correctAnswer
FROM quiz 
INNER JOIN quiz_questions  AS qq ON qq.quiz_id = quiz.quiz_id
RIGHT JOIN questions ON questions.question_id = qq.question_id
WHERE quiz.quiz_id = $id
";
$result = $conn->query($sql);

$questions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = [
            'title' => $row['title'],
            'question_id' => $row['question_id'],
            'question' => $row['question'],
            'options' => $row['options']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($questions);
