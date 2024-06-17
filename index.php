<?php
ob_start();
?>
<p>Index content</p>
<?php
$content = ob_get_clean();
$title = "Accueil";
require 'layout.php';
