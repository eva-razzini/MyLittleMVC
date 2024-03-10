<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>

    <h1>Shop</h1>

    <!-- Afficher la liste des produits récupérés -->
    <?php foreach ($products as $product): ?>
        <div>
            <h2><?php echo htmlspecialchars($product->getName()); ?></h2>
            <p><?php echo htmlspecialchars($product->getDescription()); ?></p>
            <p>Prix: <?php echo htmlspecialchars($product->getPrice()); ?></p>
        </div>
    <?php endforeach; ?>

    <!-- Ajouter des liens de pagination si nécessaire -->
    <!-- Vous pouvez utiliser les paramètres de l'URL pour gérer la pagination -->

</body>
</html>
