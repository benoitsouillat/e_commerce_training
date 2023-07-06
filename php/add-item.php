<?php

require_once(__DIR__ . '/connection.php');

//Définition des variables de POST pour Insertion dans la base de données.
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

//Connexion à la base de donnée pour fetch les données et obtenir le dernier ID
$stmt = $conn->query($all_items);
$data = $stmt->fetchAll(PDO::FETCH_OBJ);
$data_length = count($data);
$last_id = $data[$data_length - 1]->id;

//Vérification d'un $_FILES et traitement de l'image
if (isset($_FILES['image'])) {
    $file_name = ($last_id + 1) . '-' . $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_destination = '../media/img/' . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
        echo "L'image a été enregistrée avec succès dans le dossier media/img.";
    } else {
        echo "Une erreur s'est produite lors de l'enregistrement de l'image.";
    }
}
$img_path = '/media/img/' . $file_name;

// Insertion SQL des données du formulaire
$insert_sql = "INSERT INTO merchandise (name, price, description, img_path) VALUES (:name, :price, :description, :img_path)";
$stmt = $conn->prepare($insert_sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':img_path', $img_path);
try {
    $stmt->execute();
    header("Location:../index.php");
} catch (PDOException $e) {
    echo "Une erreur s'est produite : " . $e;
}
