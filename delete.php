<?php
$db = new PDO('mysql:host=localhost;dbname=literie3000;charset=UTF8', 'root', '');

$query = $db->query("SELECT * from matelas");
$literie = $query->fetchAll(PDO::FETCH_ASSOC);
?>

