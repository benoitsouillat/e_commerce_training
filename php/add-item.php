<?php

require_once(__DIR__ . '/connection.php');

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$_FILES['image']['type'] = 'jpg';
var_dump($_FILES['image']);

if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_destination = '../media/img/' . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
        echo "L'image a été enregistrée avec succès dans le dossier media/img.";
    } else {
        echo "Une erreur s'est produite lors de l'enregistrement de l'image.";
    }
}

$insert_sql = "INSERT INTO merchandise (name, price, description) VALUES (:name, :price, :description)";
$stmt = $conn->prepare($insert_sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
try {
    $stmt->execute();
    header("Location:../index.php");
} catch (PDOException $e) {
    echo "Une erreur s'est produite : " . $e;
}