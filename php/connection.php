<?php

$username = "root";
$password = "";
$bdd = "e_boutique";
$servername = "localhost";
$dsn = "mysql:host=$servername;dbname=$bdd";

$all_items = "SELECT * FROM merchandise";

try {
    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
} catch (PDOException $e) {
    echo "Erreur  : " . $e->getMessage();
}