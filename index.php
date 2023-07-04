<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en Ligne Entrainement PHP</title>

    <?php
    require_once(__DIR__ . '/src/headlinks.php');
    require_once(__DIR__ . '/php/connection.php');
    ?>
</head>

<body>
    <h1>Bienvenue sur cette boutique en ligne </h1>
    <section id="boutique" class="container-fluid d-flex flex-row">
        <div class="boutique-items">
            <?php

            ?>
        </div>
        <div>
            <a href="./php/form_add_item.php" class="btn btn-info">Ajouter un article</a>
        </div>

    </section>

</body>

</html>