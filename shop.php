<?php

require_once 'vendor/autoload.php';

use App\Model\Clothing;
use App\Model\Electronic;

// Créer une instance de la classe Clothing en passant une instance de PDO
$pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'root', '');
$clothingModel = new Clothing($pdo);

// Récupérer tous les vêtements
$clothings = $clothingModel->findAll();

// Afficher les vêtements
foreach ($clothings as $clothing) {
    echo "Clothing ID: " . $clothing->getId() . "<br>";
    echo "Clothing Name: " . $clothing->getName() . "<br>";
    echo "Clothing Size: " . $clothing->getSize() . "<br>";
    echo "Clothing Color: " . $clothing->getColor() . "<br>";
    echo "Clothing Type: " . $clothing->getType() . "<br>";
    echo "Clothing Material Fee: " . $clothing->getMaterialFee() . "<br>";
    echo "<br>";
}

// Créer une instance de la classe Electronic en passant une instance de PDO
$electronicModel = new Electronic($pdo);

// Récupérer tous les produits électroniques
$electronics = $electronicModel->findAll();

// Afficher les produits électroniques
foreach ($electronics as $electronic) {
    echo "Electronic ID: " . $electronic->getId() . "<br>";
    echo "Electronic Name: " . $electronic->getName() . "<br>";
    echo "Electronic Brand: " . $electronic->getBrand() . "<br>";
    echo "Electronic WarantyFee: " . $electronic->getWarantyFee() . "<br>";
    // Afficher d'autres informations sur le produit électronique au besoin
    echo "<br>";
}

?>
