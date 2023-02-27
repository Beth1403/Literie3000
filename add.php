<?php


if (!empty($_POST)) {

    $name = trim(strip_tags($_POST["name"]));
    $brand = trim(strip_tags($_POST["brand"]));
    $dimensions = trim(strip_tags($_POST["dimensions"]));
    $image = trim(strip_tags($_POST["image"]));
    $price = trim(strip_tags($_POST["price"]));
    $discount = trim(strip_tags($_POST["discount"]));

    $errors = [];

    if (empty($name)) {
        $errors["name"] = "Le nom du matelas est obligatoire";
    }
    if (empty($brand)) {
        $errors["brand"] = "Le nom de la marque du matelas est obligatoire";
    }
    if (empty($dimensions)) {
        $errors["dimensions"] = "Les dimensions sont obligatoires";
    }
    if (empty($price)) {
        $errors["price"] = "Le prix est obligatoire";
    }
    if ($price <= 0) {
        $errors["price2"] = "Le prix ne peut pas être de 0 ou moins";
    };
}

if (empty($errors)) {
    
    $db = new PDO('mysql:host=localhost;dbname=literie3000;charset=UTF8', 'root', '');


    $query = $db->prepare("INSERT INTO matelas (brand, name, dimensions, image, price, discount)
    VALUES (:brand, :name, :dimensions, :image, :price, :discount)");
    $query->bindParam(":name", $name);
    $query->bindParam(":brand", $brand);
    $query->bindParam(":image", $image);
    $query->bindParam(":dimensions", $dimensions);
    $query->bindParam(":price", $price, PDO::PARAM_INT);
    $query->bindParam(":discount", $discount, PDO::PARAM_INT);
    $query -> execute();

    if ($query -> execute()) {
        echo "Le matelas " . $name . " a bien été ajouté à la base de données";
    } else {
        echo "Erreur lors de l'ajout du matelas";
    }

   
};



include("templates/header.php");
?>
<main>
    <h1>Ajouter un matelas</h1>

    <form method="POST">
        <label for="brand">Marque:</label>
        <input type="text" name="brand" value="<?= isset($brand) ? $brand : "" ?>">
        <?php
        if (isset($errors["brand"])) {
        ?>
            <span class="info-error"><?= $errors["brand"] ?></span>
        <?php
        }
        ?>

        <label for="name">Nom:</label>
        <input type="text" name="name" value="<?= isset($name) ? $name : "" ?>">
        <?php
        if (isset($errors["name"])) {
            ?>
            <span class="info-error"><?= $errors["name"] ?></span>
            <?php
        }
        ?>

        <label for="dimensions">Dimensions:</label>
        <input type="text" name="dimensions" value="<?= isset($dimensions) ? $dimensions : "" ?>">
        <?php
        if (isset($errors["dimensions"])) {
            ?>
            <span class="info-error"><?= $errors["dimensions"] ?></span>
            <?php
        }
        ?>

        <label for="image">Image:</label>
        <input type="text" name="image" value="<?= isset($image) ? $image : "" ?>">
        <?php
        if (isset($errors["image"])) {
            ?>
            <span class="info-error"><?= $errors["image"] ?></span>
            <?php
        }
        ?>

        <label for="price">Prix:</label>
        <input type="number" name="price" step="100" value="<?= isset($price) ? $price : "" ?>">
        <?php
        if (isset($errors["price"])) {
            ?>
            <span class="info-error"><?= $errors["price"] ?></span>
            <?php
        }
        ?>

        <label for="discount">Promotion:</label>
        <input type="number" name="discount" step="50" value="<?= isset($discount) ? $discount : "" ?>">

        <input type="submit" value="Ajouter">
    </form>

</main>





<?php

include("templates/footer.php");
?>