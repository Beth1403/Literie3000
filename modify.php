<?php
include("templates/header.php");


$db = new PDO('mysql:host=localhost;dbname=literie3000;charset=UTF8', 'root', '');


$query = $db->prepare("SELECT * FROM matelas WHERE id = :id");
$query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

$query->execute();
$modifyMatelas = $query->fetch(PDO::FETCH_ASSOC);


?>

<form method="post" action="">
    <input type="text" name="brand" value="<?= $modifyMatelas['brand']; ?>">
    <input type="text" name="name" value="<?= $modifyMatelas['name']; ?>">
    <input type="text" name="dimensions" value="<?= $modifyMatelas['dimensions']; ?>">
    <input type="text" name="image" value="<?= $modifyMatelas['image']; ?>">
    <input type="number" step=100 name="price" value="<?= $modifyMatelas['price']; ?>">
    <input type="number" step=100 name="discount" value="<?= $modifyMatelas['discount']; ?>">

    <div class="submit"><input type="submit" name="submit" value="Modifier"></div>
</form>

<?php

if (isset($_POST['submit'])) {
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $dimensions = $_POST['dimensions'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];


    $db = "UPDATE matelas SET brand = $brand, name = $name, dimensions = $dimensions, image = $image, price = $price, discount = $discount WHERE id = :id";
    $query->execute();

    if ($query->execute()) {
?>

        <body>
            <main>

            <div class="addTitle"><h1>Informations mises à jour avec succès</h1></div>
            <?php
        } else {
            ?>
                <h1>Erreur lors de la mise à jour des données</h1>
            </main>
        </body>


<?php
        }
    }

?>
<div class="add"><a href="index.php">Retour au catalogue</a></div>