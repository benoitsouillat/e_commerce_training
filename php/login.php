<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
    <?php
    require_once(__DIR__ . '/components/connection.php');
    require_once(__DIR__ . '/components/sql.php');
    require_once(__DIR__ . '/components/items_functions.php');
    require_once(__DIR__ . '/../src/headlinks.php');

    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = get_user_by_email($conn, select_user_by_email($email));
        $hash = $user['password'];
        if (password_verify($password, $hash)) {
            session_start();
            $_SESSION['username'] = $user['firstname'];
            $_SESSION['role'] = $user['role'];
            header("Location:../index.php");
        } else {
            header("Location: ./login.php?error=mdp");
        }
    }

    ?>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <h1>Espace utilisateur</h1>
    <h2> Se connecter sur notre site </h2>
    <section class="container-fluid w-100 d-flex justify-content-center">
        <div class="boutique-items">
            <form id="login_form" method="post" action="login.php">
                <p class="error">
                    <?php
                    if (isset($_GET['error']) and $_GET['error'] = 'mdp') {
                        echo 'Les identifiants ne sont pas bons';
                    }
                    ?>
                </p>
                <div class="form-group p-2 m-2">
                    <label for="email">Email : </label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="form-group p-2 m-2">
                    <label for="password">Mot de passe : </label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <p id="error" class="error"></p>
                <div class="d-flex flex-row justify-content-around mt-4">
                    <button type="submit" class="btn btn-success">Se connecter</button>
                    <button type="reset" class="btn btn-secondary">Effacer</button>
                </div>
            </form>
        </div>
        <div class="action_container">
            <a href="../index.php" class="btn btn-info">Retour à l'accueil</a>
            <a href="./register.php" class="btn btn-warning">S'inscrire</a>
        </div>

    </section>


    <?php include_once('../src/footer.php') ?>
</body>

</html>