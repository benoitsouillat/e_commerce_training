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
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $role = $_SESSION['role'];
                echo 'Connecté : ' . $username . ' ' . $role;
            }
            ?>
            <?php
            $stmt = $conn->query($all_items);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>
                <div class="card">
                    <p class="card_name"><?php echo htmlspecialchars($row['name']); ?></p>
                    <img class="rounded" src=<?php echo '.' . htmlspecialchars($row['img_path']); ?>>
                    <p class="card_price"><?php echo htmlspecialchars($row['price'] . " €"); ?></p>
                    <p class="card_desc"><?php echo htmlspecialchars($row['description']); ?></p>
                    <div class="btn_container">
                        <a type="button" class="card_btn_modify btn btn-warning" id="<?php echo $row['id']; ?>" href="./php/modify-item.php?id=<?php echo $row['id']; ?>">Modifier
                        </a>
                        <a type="button" class="card_btn_delete btn btn-danger" id="<?php echo $row['id']; ?>" href="./php/delete-item.php?id=<?php echo $row['id']; ?>">Suppression
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
        <div class="action_container">
            <a href="./php/form_add_item.php" class="btn btn-primary">Ajouter un article</a>
            <a href="#" class="btn btn-info">Rechercher</a>
            <a href="./php/register.php" class="btn btn-success">S'inscrire</a>
            <!-- Conditionner l'affichage des boutons Se connecter, S'inscrire, Se deconnecter , Ajouter un article en fonction de l'état de connexion de l'utilisateur -- utiliser écho après vérification -->
            <a href="./php/login.php" class="btn btn-success">Se connecter</a>
        </div>
    </section>

</body>

</html>