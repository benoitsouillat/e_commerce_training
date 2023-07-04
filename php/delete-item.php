<?php

require_once('./connection.php');

$delete_sql = "DELETE FROM `merchandise` WHERE `id` = :id";
$stmt = $conn->prepare($delete_sql);
$id = $_GET['id'];
$stmt->bindValue(':id', $id);

try {
    $stmt->execute();
    header("Location:../index.php");
} catch (ErrorException $e) {
    echo $e;
}