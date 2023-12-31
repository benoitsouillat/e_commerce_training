<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article</title>
    <?php
    require_once(__DIR__ . '/../src/headlinks.php');
    require_once(__DIR__ . '/components/sql.php');
    require_once(__DIR__ . '/components/format_str.php');
    require_once(__DIR__ . '/components/items_functions.php');

    $id = $_GET['id'];

    if (isset($_POST['name'], $_POST['price'], $_POST['description'])) {
        $data = id_query_assoc($conn, select_id($id));
        $img_path = $data['img_path'];
        $img_path = record_file($id - 1, $img_path);
        insert_item($conn, update_query($id), $img_path);
    }
    $data = id_query_assoc($conn, select_id($id));
    ?>
</head>

<body>
    <section class="container-fluid" id='modify_item'>
        <div>
            <form id="form_modify_item" action="modify-item.php?id=<?php echo $data['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group p-2 m-2">
                    <label name="name">Article : </label>
                    <input id="name" class="form-control" name="name" value="<?php echo $data['name'] ?>">
                </div>
                <br>
                <div class="form-group p-2 m-2">
                    <label name="price">Prix : </label>
                    <input id="price" class="form-control" name="price" value="<?php echo $data['price'] ?>">
                </div>
                <br>
                <div class="form-group p-2 m-2">
                    <label name="description">Description : </label>
                    <textarea id="description" class="form-control" name="description"><?php echo $data['description'] ?></textarea>
                </div>

                <div class="form-group p-2 m-2">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">

                    <label>Ajouter une image de votre article</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="d-flex flex-row justify-content-around">
                    <button type="submit" class="btn btn-success">Mettre à jour l'article </button>
                    <a href="../index.php" class="btn btn-secondary">Retour à la liste des items</a>
                </div>
            </form>
            <p id="error"></p>
        </div>

    </section>

    <?php include_once('../src/footer.php'); ?>
</body>

</html>