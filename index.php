<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en Ligne Entrainement PHP</title>

    <?php
    require_once(__DIR__ . '/src/headlinks.php');
    require_once(__DIR__ . '/php/components/sql.php');
    ?>
</head>

<body>
    <h1>Bienvenue sur cette boutique en ligne </h1>
    <section id="boutique">
        <div class="boutique-items">
            <div class="w-100">
                <p>
                    <?php
                    session_start();
                    if (isset($_SESSION['username']) and ($_SESSION['username'] != "")) {
                        $username = $_SESSION['username'];
                        $role = $_SESSION['role'];
                        echo 'Connecté : ' . $username . ' - ' . $role;
                    }
                    ?>
                </p>
            </div>

            <?php
            $stmt = $conn->query($all_items);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>
            <div class="card">
                <p class="card_name"><?php echo htmlspecialchars($row['name']); ?></p>
                <img class="rounded" src=<?php echo '.' . htmlspecialchars($row['img_path']); ?>>
                <p class="card_price"><?php echo htmlspecialchars($row['price'] . " €"); ?></p>
                <p class="card_desc"><?php echo htmlspecialchars($row['description']); ?></p>
                <?php
                     if (isset($_SESSION['username']) and ($_SESSION['username'] != "")) {

                    ?>

                <div class="btn_container">
                    <a type="button" class="card_btn_modify btn btn-warning" id="<?php echo $row['id']; ?>"
                        href="./php/modify-item.php?id=<?php echo $row['id']; ?>">Modifier
                    </a>
                    <a type="button" class="card_btn_delete btn btn-danger" id="<?php echo $row['id']; ?>"
                        href="./php/delete-item.php?id=<?php echo $row['id']; ?>">Suppression
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php endwhile; ?>

        </div>
        <div class="action_container">
            <?php
            if (isset($_SESSION['username']) and ($_SESSION['username'] != "")) {        ?>
            <a href="./php/form_add_item.php" class="btn btn-primary">Ajouter un article</a>
            <a href="#" class="btn btn-info">Rechercher</a>
            <a href="./php/logout.php" class="btn btn-danger">Se déconnecter </a>

            <?php } else {
            ?>
            <a href="./php/register.php" class="btn btn-warning">S'inscrire</a>
            <a href="./php/login.php" class="btn btn-success">Se connecter</a>
            <?php } ?>
        </div>
    </section>

</body>

</html>