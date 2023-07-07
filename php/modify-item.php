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

    ?>
</head>

<body>
    <?php
    $id = $_GET['id'];

    if (isset($_POST['name'], $_POST['price'], $_POST['description'])) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        //Connexion à la base de donnée pour récupérer le path de l'ID
        $stmt = $conn->query($select_id($id));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $img_path = $data['img_path'];

        //Connexion à la base de donnée pour fetch les données et obtenir le dernier ID
        $stmt = $conn->query($all_items);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        $data_length = count($data);
        $last_id = $data[$data_length - 1]->id;

        //Vérification d'un $_FILES et traitement de l'image
        if (isset($_FILES['image'])) {
            $file_name = $replace_space(($last_id + 1) . '-' . $_FILES['image']['name']);
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_destination = '../media/img/' . $file_name;

            if (move_uploaded_file($file_tmp, $file_destination)) {
                echo "L'image a été enregistrée avec succès dans le dossier media/img.";
            } else {
                echo "Une erreur s'est produite lors de l'enregistrement de l'image.";
            }
            $img_path = '/media/img/' . $file_name;
        }

        $stmt = $conn->prepare($update_query($id));
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':img_path', $img_path);
        try {
            $stmt->execute();
            header("Location:../index.php");
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }


    $stmt = $conn->query($select_id($id));
    $stmt->execute();
    $data = $stmt->fetch();

    ?>
    <section class="container-fluid" id='modify_item'>
        <div>
            <form action="modify-item.php?id=<?php echo $data['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group p-2 m-2">
                    <label name="name">Article : </label>
                    <input class="form-control" name="name" value="<?php echo $data['name'] ?>">
                </div>
                <br>
                <div class="form-group p-2 m-2">
                    <label name="price">Prix : </label>
                    <input class="form-control" name="price" value="<?php echo $data['price'] ?>">
                </div>
                <br>
                <div class="form-group p-2 m-2">
                    <label name="description">Description : </label>
                    <textarea class="form-control" name="description"><?php echo $data['description'] ?></textarea>
                </div>

                <div class="form-group p-2 m-2">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">

                    <label>Ajouter une image de votre article</label>
                    <input class="form-control" type="file" name="image">
                </div>

                <button type="submit" class="btn btn-success">Mettre à jour l'article </button>
                <a href="../index.php" class="btn btn-danger">Retour à la liste des items</a>
            </form>
        </div>

    </section>

</body>

</html>