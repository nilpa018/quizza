<?php
require_once 'config.php';


$result = $conn->query($sql);
$tabResult=$result->fetch_all();

$sql = "SELECT question_id, question
FROM questions
";
$result = $conn->query($sql);
$questions = $result2->fetch_all();
var_dump($questions);
ob_start();
?>

<form action="update_quiz.php" method="POST" class="col-6 m-auto">
    <p class="content-title">Create quiz</p>

    <!-- input pour créernom du quiz -->
    <div class="form-group mb-2">
        <label for="quizName">Quiz name</label>
        <input type="text" class="form-control m-2" name="quizName" id="quizName" aria-describedby="quizNameHelp" value="" placeholder="entrez un nom">
        <small id="quizNameHelp" class="form-text text-muted">Use a name that describe the content.</small>
    </div>

    <label class="m-3">Questions</label>
    <div class="add-question mb-3">
        <a href="form_add_question.php"><i class="fa-solid fa-plus"></i>
            <p>Ajouter une question</p>
        </a>
    </div>
    <?php foreach($result as $question ):?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="<?= $question[1]  ?>" name="questions[]" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
       
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