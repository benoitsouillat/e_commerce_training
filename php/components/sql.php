<?php
require_once(__DIR__ . '/connection.php');



$all_items = "SELECT * FROM merchandise";

// Insertion SQL des données du formulaire
$insert_sql = "INSERT INTO merchandise (name, price, description, img_path) VALUES (:name, :price, :description, :img_path)";

$select_id = function ($id) {
    $result = "SELECT * FROM merchandise WHERE id=$id";
    return $result;
};
$update_query = function ($id) {
    return ("UPDATE merchandise SET name = :name, price = :price, description = :description, img_path = :img_path WHERE id = $id");
};
