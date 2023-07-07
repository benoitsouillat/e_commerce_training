<?php
require_once(__DIR__ . '/connection.php');



$all_items = "SELECT * FROM merchandise";


$select_id = function ($id) {
    $result = "SELECT * FROM merchandise WHERE id=$id";
    return $result;
};
$update_query = function ($id) {
    return ("UPDATE merchandise SET name = :name, price = :price, description = :description WHERE id = $id");
};
