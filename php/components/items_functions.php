<?php

require_once(__DIR__ . '/sql.php');
require_once(__DIR__ . '/connection.php');
require_once(__DIR__ . '/format_str.php');

//Connexion à la base de donnée pour fetch les données et obtenir le dernier ID
function get_last_id_number($conn, $req)
{
    $stmt = $conn->query($req);
    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    $data_length = count($data);
    return $data[$data_length - 1]->id;
};

function get_list_emails($conn, $req)
{
    $stmt = $conn->query($req);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

//Récupération de donnée d'un élement en tableau associatif
function id_query_assoc($conn, $req)
{
    $stmt = $conn->query($req);
    return $stmt->fetch(PDO::FETCH_ASSOC);
};

//Récupération de donnée d'un élement en objets
function id_query_obj($conn, $req)
{
    $stmt = $conn->query($req);
    return $stmt->fetch(PDO::FETCH_OBJ);
};

//Enregistrement du fichier Files
function record_file($last_id, $img_path)
{
    if (isset($_FILES['image'])) {
        $file_name = replace_space(($last_id + 1) . '-' . $_FILES['image']['name']);
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_destination = '../media/img/' . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo "L'image a été enregistrée avec succès dans le dossier media/img.";
            return $img_path = '/media/img/' . $file_name;
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement de l'image.";
            return $img_path;
        }
    }
};

//Insertion des données dans la base de données
function insert_item($conn, $req, $img_path)
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if (!$img_path) {
        $img_path = "/media/img/default.jpg";
    }

    $stmt = $conn->prepare($req);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':img_path', $img_path);
    try {
        $stmt->execute();
        header("Location:../index.php");
    } catch (PDOException $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
};
