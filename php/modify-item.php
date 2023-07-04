<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article</title>
    <?php
    require_once(__DIR__ . '/../src/headlinks.php');
    ?>
</head>

<body>
    <?php

    require_once('./connection.php');

    $id = $_GET['id'];

    if (isset($_POST['name'], $_POST['price'], $_POST['description'])) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $update_query = "UPDATE merchandise SET name = :name, price = :price, description = :description WHERE id = $id";
        $stmt = $conn->prepare($update_query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);

        try {
            $stmt->execute();
            header("Location:../index.php");
        } catch (PDOException $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }


    $select_id = "SELECT * FROM merchandise WHERE id=$id";
    $stmt = $conn->query($select_id);
    $stmt->execute();
    $data = $stmt->fetch();

    ?>
    <section class="container-fluid" id='modify_item'>
        <div>
            <form class="d-flex" action="modify-item.php?id=<?php echo $data['id'] ?>" method="POST">
                <div class="d-flex flex-column align-items-center p-2 m-2">
                    <label name="name">Article : </label>
                    <input name="name" value="<?php echo $data['name'] ?>">
                </div>
                <br>
                <div class="d-flex flex-column align-items-center p-2 m-2">
                    <label name="price">Prix : </label>
                    <input name="price" value="<?php echo $data['price'] ?>">
                </div>
                <br>
                <div class="d-flex flex-column align-items-center p-2 m-2">
                    <label name="description">Description : </label>
                    <textarea name="description"><?php echo $data['description'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-success">Mettre à jour l'article </button>
            </form>
        </div>
        <a href="../index.php" class="btn btn-danger">Retour à la liste des items</a>

    </section>

</body>

</html>