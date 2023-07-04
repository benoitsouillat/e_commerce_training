<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article </title>
    <?php
    require_once(__DIR__ . '/../src/headlinks.php');
    require_once(__DIR__ . '/connection.php');
    ?>

</head>

<body>
    <h1>Ajouter un article on DB</h1>

    <section class="container-fluid" id='add_item'>
        <div>
            <form class="d-flex" action="">
                <div class="d-flex flex-column align-items-center p-2 m-2">
                    <label name="name">Article : </label>
                    <input name="name" placeholder="Nom de l'article">
                </div>
                <br>
                <div class="d-flex flex-column align-items-center p-2 m-2">
                    <label name="price">Prix : </label>
                    <input name="price" placeholder="10">
                </div>
                <br>
                <div class="d-flex flex-column align-items-center p-2 m-2">
                    <label name="description">Description : </label>
                    <textarea name="description" placeholder="La description de l'article ... "></textarea>
                </div>

                <button type="submit" class="btn btn-success">Ajouter l'article </button>
            </form>
        </div>

    </section>

</body>

</html>