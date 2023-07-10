<?php
require_once(__DIR__ . '/connection.php');

$all_items = "SELECT * FROM merchandise";
$all_users = "SELECT * FROM users";

// Insertion SQL des données du formulaire de la galerie
$insert_sql = "INSERT INTO merchandise (name, price, description, img_path) VALUES (:name, :price, :description, :img_path)";

function select_id($id)
{
    $result = "SELECT * FROM merchandise WHERE id=$id";
    return $result;
};
function update_query($id)
{
    return ("UPDATE merchandise SET name = :name, price = :price, description = :description, img_path = :img_path WHERE id = $id");
};
function select_user_by_email($email)
{
    return ("SELECT * FROM users WHERE email='$email'");
}

function insert_user()
{
    return "INSERT INTO users (firstname, lastname, email, password, img_profil_path) VALUES (:firstname, :lastname, :email, :password, :img_profil_path)";
}
function get_all_emails()
{
    return "SELECT email FROM users";
}
