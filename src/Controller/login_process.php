<?php

require_once 'vendor/autoload.php';

use App\Controller\AuthenticationController;

// Instancier le contrôleur d'authentification
$authController = new AuthenticationController();

// Récupérer les données du formulaire
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Appeler la méthode login
$result = $authController->login($password, $email);

// Rediriger en fonction du résultat
if ($result === true) {
    // Redirection vers shop.php si l'authentification réussit
    header('Location: shop.php');
    exit();
} else {
    // Redirection vers login.php avec un message d'erreur si l'authentification échoue
    header('Location: login.php?error=' . urlencode($result));
    exit();
}
