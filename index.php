<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en Ligne Entrainement PHP</title>

    <?php
    require_once(__DIR__ . '/src/headlinks.php');
    require_once(__DIR__ . '/php/connection.php');
    ?>
</head>

<body>
    <h1>Bienvenue sur cette boutique en ligne </h1>
    <section id="boutique" class="container-fluid d-flex flex-row">
        <div class="boutique-items">
            <?php
            $stmt = $conn->query($all_items);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
            ?>
            <div class="card">
                <p class="card_name"><?php echo htmlspecialchars($row['name']); ?></p>
                <p class="card_price"><?php echo htmlspecialchars($row['price'] . " €"); ?></p>
                <p class="card_desc"><?php echo htmlspecialchars($row['description']); ?></p>
                <button type="button" class="card_btn_delete btn btn-danger" id="<?php echo $row['id']; ?>">Suppression
                </button>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="p-4">
            <a href="./php/form_add_item.php" class="btn btn-info">Ajouter un article</a>
        </div>
    </section>

</body>

</html>