<?php

require_once(__DIR__ . '/php/components/connection.php');

$table_merchandise = "CREATE TABLE `e_boutique`. `merchandise` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `price` INT NOT NULL DEFAULT '1' , `description` VARCHAR(255) NOT NULL , `img_path` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$table_users = "CREATE TABLE `e_boutique`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(50) NOT NULL , `lastname` VARCHAR(50) NOT NULL , `role` VARCHAR(15) NOT NULL DEFAULT 'utilisateur' , `img_profil_path` VARCHAR(255) NOT NULL DEFAULT '/media/users/default.jpg' , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$conn->exec($table_merchandise);
$conn->exec($table_users);
