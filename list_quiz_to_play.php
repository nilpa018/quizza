<?php
require_once 'config.php';

$sql="SELECT quiz_id, title
From quiz
order by quiz_id DESC

";

$result = $conn->query($sql);
ob_start();
?>
<h2>Quizzes list</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Play</th>  
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) :  ?>
        <tr>
            <th scope="row"><?= $row['quiz_id'];?></th>
            <td><?= $row['title'];?></td>
            <td><a href="play.php"><i class="fa-solid fa-play"></a></i></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
$title = "quizzes list";
$content = ob_get_clean();
include 'layout.php';