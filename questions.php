<?php
require_once 'config.php';

$sql = "SELECT question_id, question, options, correctAnswer, level, category
    FROM questions
    ORDER BY category;
";

$result = $conn->query($sql);
ob_start();
?>
<p class="content-title">Questions management</p>

<div class="add-question mb-3">
    <a href="form_add_question.php"><i class="fa-solid fa-plus"></i>
        <p>Ajouter une question</p>
    </a>

</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Categoy</th>
            <th scope="col">Level</th>
            <th scope="col">Question</th>
            <th scope="col">Options</th>
            <th scope="col">Correct answer</th>
            <th scope="col" colspan="2">Modifications</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <th scope="row"><?= $row['question_id']; ?></th>
                <td><?= $row['category']; ?></td>
                <td><?= $row['level']; ?></td>
                <td><?= $row['question']; ?></td>
                <td><?= $row['options']; ?></td>
                <td><?= $row['correctAnswer']; ?></td>
                <td class='border px-2 py-1'>
                    <form action='delete_question.php' method='post'>
                        <input type="hidden" name="delete_Id" value="<?= $row['question_id'] ?>">
                        <button type="submit"> <i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                <td class='border px-2 py-1'>
                    <form action='form_update_question.php' method='post'>
                        <input type="hidden" name="update_Id" value="<?= $row['question_id'] ?>">
                        <button type="submit"><i class="fa-solid fa-pen"></i></button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>


<?php
$title = "questions";
$content = ob_get_clean();
include 'layout.php';
