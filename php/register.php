<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <?php
    require_once(__DIR__ . '/../src/headlinks.php');
    ?>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <h1>Espace utilisateur</h1>
    <h2> S'inscrire sur notre site </h2>
    <section class="container-fluid register_bloc w-100 d-flex justify-content-center">
        <form id="form_add_user" method="post" action="./users/register_user.php" enctype="multipart/form-data">
            <div class="form-group p-2 m-2">
                <label for="firstname">Prénom : </label>
                <input class="form-control" type="text" name="firstname" id="firstname" required>
            </div>
            <br>
            <div class="form-group p-2 m-2">
                <label for="lastname">Nom : </label>
                <input class="form-control" type="text" name="lastname" id="lastname" required>
            </div>
            <br>
            <div class="form-group p-2 m-2">
                <label for="email">Email : </label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <div class="form-group p-2 m-2">
                <label for="email-verification">Vérifier Email : </label>
                <input class="form-control" type="email" name="email-verification" id="email-verification" required>
            </div>
            <div class="form-group p-2 m-2">
                <label for="password">Mot de passe : </label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group p-2 m-2">
                <label for="password-verification">Vérifiez le Mot de passe : </label>
                <input class="form-control" type="password" name="password-verification" id="password-verification"
                    required>
            </div>
            <br>
            <div class="form-group p2 m2">
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                <label for="profil_img">Choisissez une image de profil</label>
                <input class="form-control" type="file" name="profil_img" id="profil_img">
            </div>
            <div class="d-flex flex-row justify-content-around mt-4">
                <button type="submit" class="btn btn-success">S'inscrire</button>
                <button type="reset" class="btn btn-secondary">Effacer</button>
            </div>
        </form>
        <div class="action_container">
            <a href="./form_add_item.php" class="btn btn-primary">Ajouter un article</a>
            <a href="../index.php" class="btn btn-info">Retour à l'accueil</a>
        </div>
    </section>
    <p id="error"></p>

    <?php include_once('../src/footer.php') ?>
</body>

</html>