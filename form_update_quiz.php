<?php
require_once 'config.php';

$id = $_POST['quizId'];
$sql= "SELECT title , question
FROM quiz 
INNER JOIN quiz_questions  AS qq ON qq.quiz_id = quiz.quiz_id
RIGHT JOIN questions ON questions.question_id = qq.question_id
WHERE quiz.quiz_id = 2
";
$result = $conn->query($sql);
$tabResult=$result->fetch_all();

?>

<form class="col-6 m-auto">
    <p class="content-title">Quiz update</p>
    <div class="form-group mb-2">
        <label for="quizName">Quiz name</label>
        <input type="text" class="form-control m-2" id="quizName" aria-describedby="quizNameHelp" value="<?= $tabResult[0][0] ?>">
        <small id="quizNameHelp" class="form-text text-muted">Use a name that describe the content.</small>
    </div>
        <?php foreach($tabResult as $question ):?>
    <label class="m-3">Questions</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
           <?= $question[1] ?>
        </label>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>

<?php
$title = "quiz update";
$content = ob_get_clean();
include 'layout.php';