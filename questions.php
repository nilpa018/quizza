<?php
require_once 'config.php';

$sql = "SELECT question_id, question, options, correctAnswer, level, category
    FROM questions
    ORDER BY category;
";

$result = $conn->query($sql);
ob_start();
?>
<h2>Questions management</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Categoy</th>
            <th scope="col">Level</th>
            <th scope="col">Question</th>
            <th scope="col">Options</th>
            <th scope="col">Correct answer</th>    
            <th scope="col">Modifications</th> 
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) : ?>
        <tr>
            <th scope="row"><?= $row['question_id']; ?></th>
            <td><?= $row['category']; ?></td>
            <td><?= $row['level']; ?></td>
            <td><?= $row['question']; ?></td>
            <td><?= $row['options']; ?></td>
            <td><?= $row['correctAnswer']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
    
</table>


<?php
$title = "questions";
$content = ob_get_clean();
include 'layout.php';