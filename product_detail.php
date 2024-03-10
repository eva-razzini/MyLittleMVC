<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
</head>
<body>

    <h1>Product Detail</h1>

    <h2><?php echo htmlspecialchars($product->getName()); ?></h2>
    <p>Type: <?php echo htmlspecialchars($product->getType()); ?></p>
    <p>Description: <?php echo htmlspecialchars($product->getDescription()); ?></p>
    <p>Prix: <?php echo htmlspecialchars($product->getPrice()); ?></p>

    <!-- Ajouter d'autres détails spécifiques au produit -->

</body>
</html>
