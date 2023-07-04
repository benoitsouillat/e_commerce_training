<?php

$username = "root";
$password = "";
$bdd = "e_boutique";
$servername = "localhost";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
} catch (PDOException $e) {
    echo "Erreur  : " . $e->getMessage();
}