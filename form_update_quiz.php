<?php
require_once 'config.php';

$id = $_POST['quiz_id'];
$sql= "SELECT quiz.quiz_id,title , question
FROM quiz 
INNER JOIN quiz_questions  AS qq ON qq.quiz_id = quiz.quiz_id
RIGHT JOIN questions ON questions.question_id = qq.question_id
WHERE quiz.quiz_id = 2
"
?>
<form class="col-6 m-auto">
<div class="form-group mb-2">
    <label for="quizName">Quiz name</label>
    <input type="text" class="form-control m-2" id="quizName" aria-describedby="quizNameHelp" placeholder="Enter name">
    <small id="quizNameHelp" class="form-text text-muted">Use a name that describe the content.</small>
</div>

<label class="m-3">Questions</label>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, asperiores cumque dolorum distinctio explicabo corporis totam! Odio accusamus cupiditate ea dolores sit, possimus commodi beatae, quaerat similique, error repellat dolore?
  </label>
</div>
  <button type="submit" class="btn btn-primary m-2">Submit</button>

</form>

<?php
$title = "quiz update";
$content = ob_get_clean();
include 'layout.php';