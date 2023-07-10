<?php

const DEFAULT_PROFIL_PATH = "/media/users/default.jpg";

require_once(__DIR__ . '/../components/connection.php');
require_once(__DIR__ . '/../components/sql.php');
require_once(__DIR__ . '/../components/format_str.php');
require_once(__DIR__ . '/../components/items_functions.php');

if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $img_profil_path = DEFAULT_PROFIL_PATH;

    if (isset($_FILES['profil_img'])) {
        $id = get_last_id_number($conn, $all_users);

        $file_name = $id + 1 . replace_space(strtolower($firstname . '-' . $lastname)) . '.jpg';
        $file_tmp = $_FILES['profil_img']['tmp_name'];
        $file_destination = '../../media/users/' . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo "L'image a bien été enregistrée";
            $img_profil_path = "/media/users/" . $file_name . '.jpg';
        } else {
            echo "Une erreur s'est produite pendant l'enregistrement de l'image de profil";
        }
    }

    $stmt = $conn->prepare(insert_user());
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':img_profil_path', $img_profil_path);
    try {
        $stmt->execute();
        header("Location:../../index.php");
    } catch (PDOException $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}
