<?php

require_once 'vendor/autoload.php';

use App\Model\Clothing;
use App\Model\Electronic;

// Vérifie si les paramètres 'id_product' et 'product_type' existent dans l'URL
if (isset($_GET['id_product']) && isset($_GET['product_type'])) {
    $idProduct = filter_input(INPUT_GET, 'id_product', FILTER_VALIDATE_INT);
    $productType = filter_input(INPUT_GET, 'product_type', FILTER_SANITIZE_STRING);

    if ($idProduct !== false && in_array($productType, ['clothing', 'electronic'])) {
        // Instancier le bon modèle en fonction du type de produit
        $productModel = ($productType === 'clothing') ? new Clothing() : new Electronic();

        // Récupérer le produit avec l'id correspondant en base de données
        $product = $productModel->findOneById($idProduct);

        // Si le produit existe, afficher ses informations
        if ($product !== false) {
            echo "Product ID: " . $product->getId() . "<br>";
            echo "Product Name: " . $product->getName() . "<br>";
            // Afficher d'autres informations spécifiques au type de produit
            if ($product instanceof Clothing) {
                echo "Clothing Size: " . $product->getSize() . "<br>";
                echo "Clothing Color: " . $product->getColor() . "<br>";
                echo "Clothing Type: " . $product->getType() . "<br>";
                echo "Clothing Material Fee: " . $product->getMaterialFee() . "<br>";
            } elseif ($product instanceof Electronic) {
                echo "Electronic Brand: " . $product->getBrand() . "<br>";
                echo "Electronic Waranty Fee: " . $product->getWarantyFee() . "<br>";
            }
        } else {
            // Si le produit n'existe pas, afficher un message d'erreur
            echo "Le produit demandé n'est pas disponible.";
        }
    } else {
        // Si les paramètres 'id_product' et 'product_type' sont incorrects, afficher un message d'erreur
        echo "Paramètres d'URL invalides.";
    }
} else {
    // Si les paramètres 'id_product' et 'product_type' ne sont pas présents dans l'URL, afficher un message d'erreur
    echo "Paramètres d'URL manquants.";
}

?>
