<?php
require_once 'config.php';


$sql = "SELECT question_id, question
FROM questions
";
$result = $conn->query($sql);
$questions = $result->fetch_all();
ob_start();
?>

<form action="create_quiz.php" method="POST" class="col-6 m-auto">
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
    <?php foreach($questions as $question ):?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="<?= $question[0]  ?>" name="questions[]" id="flexCheckDefault" >
        <label class="form-check-label" for="flexCheckDefault">
        <?= $question[1]  ?>
        </label>
    </div>
    <?php endforeach; 
    ?>
    <button type="submit" class="btn btn-primary m-2">Submit</button>
</form>

<?php
$title = "quiz creation";
$content = ob_get_clean();
include 'layout.php';