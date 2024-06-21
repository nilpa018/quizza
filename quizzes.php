<?php
require_once 'config.php';

$sql = "SELECT quiz.quiz_id, title,questions.question_id, question
From quiz
INNER JOIN quiz_questions AS qq ON qq.quiz_id = quiz.quiz_id
LEFT JOIN questions ON questions.question_id = qq.question_id
order by quiz_id DESC
;";
$result = $conn->query($sql);
ob_start();
?>
<h2>Quizzes management</h2>
<div class="add-question mb-3">
    <a href="form_create_quiz.php"><i class="fa-solid fa-plus"></i>
        <p>Créer un nouveau quiz</p>
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Question</th>
            <th scope="col" colspan="2">Modifications</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) :  ?>
            <tr>
                <th scope="row"><?= $row['quiz_id']; ?></th>
                <td><?= $row['title']; ?></td>
                <td><?= $row['question'];
                    ?></td>
                <td class='border px-2 py-1'>
                    <form action='delete_quiz.php' method='post'>
                        <input type="hidden" name="deleteQuizId" value="<?= $row["quiz_id"] ?>">
                        <button class="btn btn-light" type="submit"> <i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                <td class='border px-2 py-1'>
                    <form action='form_update_quiz.php' method='post'>
                        <input type="hidden" name="updateQuizId" value="<?= $row["quiz_id"] ?>">
                        <button class="btn btn-light" type="submit"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>


<?php
$title = "quizzes";
$content = ob_get_clean();
include 'layout.php';
