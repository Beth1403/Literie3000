<?php

// Connexion à la database Literie3000 et récupération des données de la table matelas
$db = new PDO('mysql:host=localhost;dbname=literie3000;charset=UTF8', 'root', '');

$query = $db->query("SELECT * from matelas");
$literie = $query->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>' , var_dump($literie) , '</pre>';

include("templates/header.php");

?>

<body>


    <main>
        <div class="container">


            <div class="literie">
                <div class="mat">
                    <?php
                    foreach ($literie as $mat) {

                    ?>


                        <div class="specimen">

                            <div class="img"><img src="<?= $mat["image"] ?>" alt=""></div>
                            <div class="text">
                                <div class="brand">
                                    <h2><?= $mat["brand"] ?></h2>
                                </div>

                                <div class="name">
                                    <p><?= $mat["name"] ?>
                                        <?= $mat["dimensions"] ?></p>
                                </div>
                                <div class="price">
                                    <p><?= $mat["price"] ?> €
                                </div>
                                <div class="discount"> <?= $mat["discount"] ?>€</p>
                                </div>
                                <div class="buttons">
                                    <a href="modify.php?id=<?= $mat["id"] ?>">Modifier</a>
                                    <a href="delete.php?id=<?= $mat["id"] ?>">Supprimer</a>
                                </div>
                            </div>

                        </div>

                        <?php
                    }
                        ?>

                        
                        

                </div>
                <div class="add"><a href="add.php">Ajouter un matelas</a></div>
            </div>

    </main>
</body>






<?php

include("templates/footer.php");
?>