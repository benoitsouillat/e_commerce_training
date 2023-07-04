<?php

require_once(__DIR__ . '/connection.php');

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$insert_sql = "INSERT INTO merchandise (name, price, description) VALUES (:name, :price, :description)";
$stmt = $conn->prepare($insert_sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':description', $description);
try {
    $stmt->execute();
    echo "L'article a bien été ajouté !";
    header("Location:../index.php");
} catch (PDOException $e) {
    echo "Une erreur s'est produite : " . $e;
}