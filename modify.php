<?php
include("templates/header.php");


$find = false;
$data = array("name" => "Matelas introuvable");
if (isset($_GET["id"])) {
    $db = new PDO('mysql:host=localhost;dbname=literie3000;charset=UTF8', 'root', '');

    $query = $db->prepare("SELECT * FROM matelas WHERE id = :id");
    // 2/ On donne des valeurs à nos paramètres
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    // 3/ On execute notre requête préalablement préparée
    $query->execute();
    $modifyMatelas = $query->fetch();
}
