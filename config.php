<?php
$servername = "localhost";
$user = "quizza";
$pwd = "quizza";
$db = "quizza";

$conn = new mysqli($servername,$user, $pwd, $db);


// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}