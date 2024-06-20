<?php
require_once 'config.php';
$title = "Update a question";
$questionId = $_POST['update_Id'];
$sql = "SELECT question, options, correctAnswer, level, category FROM `questions` WHERE question_id = $questionId;";
$result = $conn->query($sql);
$sql2 = "SELECT category FROM `questions` GROUP BY category;";
$result2 = $conn->query($sql2);
echo "page précédante:";
echo $SERVER['HTTP_REFERER'];
ob_start();
?>

<p class="content-title"><?= $title ?></p>
<div class="container-lg">
    <?php while ($row = $result->fetch_assoc()) : ?>
        <form class="py-4" method="POST" action="update_question.php">
            <div class="mb-3">
                <label for="categoryList" class="form-label mb-3">Category</label>
                <input class="form-control" list="datalistOptions" id="categoryList" name="category" placeholder="Type to search..." value="<?= $row['category'] ?>">
                <datalist id="datalistOptions">
                    <?php while ($row2 = $result2->fetch_assoc()) : ?>
                        <option value="<?= $row2['category'] ?>">
                        <?php endwhile; ?>
                </datalist>
            </div>
            <div class="mb-3">
                <label for="selectLevel" class="form-label">Level</label>
                <select class="form-select" id="selectLevel" aria-label="Default select example" name="level">
                    <option selected><?= $row['level'] ?></option>
                    <option value="Beginner">Beginner</option>
                    <option value="Medium">Medium</option>
                    <option value="Advanced">Advanced</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Question</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="question" value="<?= $row['question'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Options</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="split answer with (;) ex: answer1; answer2; answer3 " name="options" value="<?= $row['options'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Correct Answer</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="index of correct answer in options start at index 0 ex: 2nd correct answer = 1" name="correctAnswer" value="<?= $row['correctAnswer'] ?>">
            </div>
            <div class="buttons py-4">
                <a href="index.php" class="btn btn-secondary mx-4">CANCEL</a>
                <button type="submit" class="btn btn-primary mx-4">UPDATE</button>
            </div>
            <input type="hidden" name="update_Id" value="<?= $questionId ?>">
            <input type="hidden" name="location" value="<?= $SERVER['HTTP_REFERER'] ?>">
        </form>
    <?php endwhile; ?>
</div>

<?php
$content = ob_get_clean();

require 'layout.php';
