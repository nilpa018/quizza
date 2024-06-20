<?php
ob_start();
?>
<div id="quiz-container">
    <div id="question-container"></div>
    <div id="score-container">Score: <span id="score">0</span></div>
</div>
<?php
$content = ob_get_clean();
$title = "Play";
require 'layout.php';
