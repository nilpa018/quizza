<?php
require_once 'config.php';

$id = $_POST['quizId'];
$sql= "SELECT title , questions.question_id, question
FROM quiz 
INNER JOIN quiz_questions  AS qq ON qq.quiz_id = quiz.quiz_id
RIGHT JOIN questions ON questions.question_id = qq.question_id
WHERE quiz.quiz_id = 2
";

$result = $conn->query($sql);
$tabResult=$result->fetch_all();

$sql2 = "SELECT questions.question_id, question
FROM questions
JOIN quiz_questions AS qq ON qq.question_id = questions.question_id
WHERE qq.quiz_id != $id;
";
$result2 = $conn->query($sql2);
$questions = $result2->fetch_all();
ob_start();
?>

<form action="update_quiz.php" method="POST" class="col-6 m-auto">
    <p class="content-title">Quiz update</p>

    <!-- input pour changer nom du quiz -->
    <input type="hidden" name="quizId" value="<?=$id?>">
    <div class="form-group mb-2">
        <label for="quizName">Quiz name</label>
        <input type="text" class="form-control m-2" name="quizName" id="quizName" aria-describedby="quizNameHelp" value="<?= $tabResult[0][0] ?>">
        <small id="quizNameHelp" class="form-text text-muted">Use a name that describe the content.</small>
    </div>

    <label class="m-3">Questions</label>
    <div class="add-question mb-3">
        <a href="form_add_question.php"><i class="fa-solid fa-plus"></i>
            <p>Ajouter une question</p>
        </a>
    </div>
    <?php foreach($tabResult as $question ):?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="<?= $question[1]  ?>" name="questions[]" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
           <?= $question[2] ?>
        </label>
    </div>
    <?php endforeach; 
    foreach($questions as $questionfree):
        ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?= $questionfree[0] ?>" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            <?= $questionfree[1] ?>
            </label>
        </div>
    <?php endforeach; ?>
    
    <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>

<?php
$title = "quiz update";
$content = ob_get_clean();
include 'layout.php';