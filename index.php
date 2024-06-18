<?php
ob_start();
?>
<?php
$content = ob_get_clean();
$title = "Accueil";
require 'layout.php';
