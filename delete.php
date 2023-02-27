<?php
include("templates/header.php");
$find = false;
$data = array("name" => "Matelas introuvable");
if (isset($_GET["id"])) {
    $db = new PDO('mysql:host=localhost;dbname=literie3000;charset=UTF8', 'root', '');

    // Requête pour tenter de retrouver cette recette
    // 1/ On prépare la requête SQL avec des paramètres
    $query = $db->prepare("SELECT * FROM matelas WHERE id = :id");
    // 2/ On donne des valeurs à nos paramètres
    $query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    // 3/ On execute notre requête préalablement préparée
    $query->execute();
    $deleteMatelas = $query->fetch();

    if ($deleteMatelas) {
        // nous avons trouvé le matelas \o/
        $find = true;
        $data = $deleteMatelas;

        $delete = $db->prepare("DELETE FROM matelas WHERE id = :id");
        $delete->execute(array(":id" => $_GET["id"]));

        if ($delete->rowCount() > 0) {
            ?>
            <h1> Matelas supprimé avec succès </h1>
            <h2><a href="index.php">Retour au catalogue</a></h2>
            <?php
        }
    }
}

include("templates/footer.php");
?>

<main>
    
</main>

