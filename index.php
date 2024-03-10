<?php

require_once 'vendor/autoload.php';

use App\Controller\ShopController;

// Récupérer le numéro de page à partir de l'URL (utilisez votre propre logique)
$page = $_GET['page'] ?? 1;

// Instancier le contrôleur de la boutique (ShopController)
$shopController = new ShopController();

// Appeler la méthode index avec le numéro de page
$shopController->index($page);