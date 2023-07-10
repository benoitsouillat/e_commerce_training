<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article </title>
    <?php
    require_once(__DIR__ . '/../src/headlinks.php');
    require_once(__DIR__ . './components/sql.php');
    ?>

</head>

<body>
    <h1>Ajouter un article on DB</h1>

    <section class="container-fluid" id='add_item'>
        <div class="d-flex flex-row justify-content-center">
            <div class="w-50 d-flex flex-column align-items-center">
                <form id="form_add_item" action="add-item.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group p-2 m-2">
                        <label name="name">Article : </label>
                        <input id="name" class="form-control" name="name" placeholder="Nom de l'article" required>
                    </div>
                    <br>
                    <div class="form-group p-2 m-2">
                        <label name="price">Prix : </label>
                        <input id="price" class="form-control" name="price" placeholder="10" required>
                    </div>
                    <br>
                    <div class="form-group p-2 m-2">
                        <label name="description">Description : </label>
                        <textarea id="description" class="form-control" name="description" placeholder="La description de l'article ... "></textarea>
                    </div>
                    <div class="form-group p-2 m-2">
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">

                        <label>Ajouter une image de votre article</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="d-flex flex-row justify-content-around">

                        <button type="submit" class="form-button btn btn-success">Ajouter l'article </button>
                        <a href="../index.php" class="btn btn-secondary">Retour à la liste des objets</a>
                    </div>
                </form>
                <p id="error"></p>
            </div>
        </div>

    </section>


    <?php include_once('../src/footer.php'); ?>

</body>

</html>