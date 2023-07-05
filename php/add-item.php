<?php

require_once(__DIR__ . '/connection.php');

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
var_dump($_POST);
var_dump($_FILES);

/* $path = $_POST['img_path']; */

$insert_sql = "INSERT INTO merchandise (name, price, description) VALUES (:name, :price, :description)";
$stmt = $conn->prepare($insert_sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
try {
    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_destination = '../media/img/' . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo "L'image a été enregistrée avec succès dans le dossier media/img.";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement de l'image.";
        }
        die();
    }

    $stmt->execute();
    header("Location:../index.php");
} catch (PDOException $e) {
    echo "Une erreur s'est produite : " . $e;
}