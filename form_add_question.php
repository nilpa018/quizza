<?php
require_once 'config.php';
$title = "Add a question";
$sql = "SELECT category FROM `questions` GROUP BY category;";
$result = $conn->query($sql);
ob_start();
?>
<p class="content-title"><?= $title ?></p>
<div class="container-lg">
    <form class="py-4" method="POST" action="add_question.php">
        <div class="mb-3">
            <label for="categoryList" class="form-label mb-3">Category</label>
            <input class="form-control" list="datalistOptions" id="categoryList" name="category" placeholder="Type to search...">
            <datalist id="datalistOptions">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <option value="<?= $row['category'] ?>">
                    <?php endwhile; ?>
            </datalist>
        </div>
        <div class="mb-3">
            <label for="selectLevel" class="form-label">Level</label>
            <select class="form-select" id="selectLevel" aria-label="Default select example" name="level">
                <option selected>Choose level</option>
                <option value="Beginner">Beginner</option>
                <option value="Medium">Medium</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Question</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="question">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Options</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="split answer with (;) ex: answer1; answer2; answer3 " name="options">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Correct Answer</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="index of correct answer in options start at index 0 ex: 2nd correct answer = 1" name="correctAnswer">
        </div>
        <div class="buttons py-4">
            <button type="cancel" class="btn btn-secondary mx-4">CANCEL</button>
            <button type="submit" class="btn btn-primary mx-4">ADD</button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();

require 'layout.php';
