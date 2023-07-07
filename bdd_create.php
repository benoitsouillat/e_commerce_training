<?php

require_once(__DIR__ . '/php/components/connection.php');

$table_merchandise = "CREATE TABLE `e_boutique`. `merchandise` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `price` INT NOT NULL DEFAULT '1' , `description` VARCHAR(255) NOT NULL , `img_path` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$conn->exec($table_merchandise);
