<?php

namespace App\Controller;

use App\Model\Product;
use App\Model\ClothingProduct;
use App\Model\ElectronicProduct;


class ShopController
{
    public function index($page)
    {
        // Instancier la classe Product
        $productModel = new Product();

        // Appeler la méthode findPaginated pour obtenir les produits paginés
        $products = $productModel->findPaginated($page);

        // Inclure la vue du shop en passant les produits en paramètre
        include 'shop.php';
    }

    public function showProduct($idProduct, $productType)
    {
        $authController = new AuthenticationController();

        // Vérifier si l'utilisateur est connecté
        if ($authController->isUserLoggedIn()) {
            // Récupérer le produit en fonction du type
            if ($productType === 'clothing') {
                $product = (new ClothingProduct())->findOneById($idProduct);
            } elseif ($productType === 'electronic') {
                $product = (new ElectronicProduct())->findOneById($idProduct);
            } else {
                // Gérer un type de produit invalide ici
                // Rediriger vers une page d'erreur ou une page par défaut
                header('Location: error.php');
                exit();
            }

            // Vérifier si le produit a été trouvé
            if ($product) {
                // Afficher les informations du produit dans la vue
                include 'product_detail.php';
            } else {
                // Gérer le cas où le produit n'est pas trouvé
                // Rediriger vers une page d'erreur ou une page par défaut
                header('Location: error.php');
                exit();
            }
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            header('Location: login.php?error=Vous devez être connecté pour voir ce produit.');
            exit();
        }
    }
}
