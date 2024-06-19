<?php
require_once 'config.php';
$filterLevel = isset($_POST['level']) ? $_POST['level'] : '';
$filterCategory = isset($_POST['category']) ? $_POST['category'] : '';

$sql = "SELECT question_id, question, options, correctAnswer, level, category FROM questions WHERE 1 = 1";

if (!empty($filterLevel)) {
    $sql .= " AND level = '$filterLevel'";
}

if (!empty($filterCategory)) {
    $sql .= " AND category = '$filterCategory'";
}

$result = $conn->query($sql);

$sql2 = "SELECT level FROM `questions` GROUP BY level;";
$result2 = $conn->query($sql2);

$sql3 = "SELECT category FROM `questions` GROUP BY category;";
$result3 = $conn->query($sql3);

ob_start();
?>
<p class="content-title">Questions management</p>
<div class="add-question mb-3">
    <a href="form_add_question.php"><i class="fa-solid fa-plus"></i>
        <p>Ajouter une question</p>
    </a>
</div>
<div class="filtered-questions">
    <form action="questions.php" method="post">
        <div class="mb-3">
            <label for="filterLevel" class="form-label">Filter by level</label>
            <select class="form-select" id="filterLevel" aria-label="Default select example" name="level">
                <option value="" selected>Choose level</option>
                <?php while ($row2 = $result2->fetch_assoc()) : ?>
                    <option value="<?= $row2['level'] ?>"><?= $row2['level'] ?></option>
                <?php endwhile; ?>
            </select>
            <label for="filterCategory" class="form-label">Filter by category</label>
            <select class="form-select" id="filterCategory" aria-label="Default select example" name="category">
                <option value="" selected>Choose category</option>
                <?php while ($row3 = $result3->fetch_assoc()) : ?>
                    <option value="<?= $row3['category'] ?>"><?= $row3['category'] ?></option>
                <?php endwhile; ?>
            </select>
            <button type="submit" class="btn btn-primary mx-4 mt-3">Filter</button>
        </div>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
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
