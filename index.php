<?php
ob_start();
?>
<div class="text-center">
    <a href="list_quiz_to_play.php" class="btn bg-primary p-2 m-5">play</a>
    <a href="quizzes.php" class="btn bg-primary">manage</a>
</div>
<?php
$content = ob_get_clean();
$title = "Accueil";
require 'layout.php';
