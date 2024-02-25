<?php

namespace App\Controller;

class ProfileController
{
    public function showProfile()
    {
        $authController = new AuthenticationController();

        // Vérifier si l'utilisateur est connecté
        $user = $authController->getAuthenticatedUser();

        if ($user) {
            // Afficher les informations du profil
            include 'profile.php';
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            header('Location: login.php?error=1');
            exit();
        }
    }

    public function updateProfile($email, $password, $fullname)
    {
        $authController = new AuthenticationController();

        // Vérifier si l'utilisateur est connecté
        $user = $authController->getAuthenticatedUser();

        if ($user) {
            // Mettre à jour les informations de l'utilisateur
            $user->setEmail($email);
            $user->setPassword($password); // Assurez-vous d'ajouter la logique de hachage du mot de passe
            $user->setFullName($fullname);

            // Mettre à jour en base de données
            $user->update();

            // Mettre à jour en SESSION
            $_SESSION['user'] = $user;

            // Rediriger vers la page de profil
            header('Location: profile.php');
            exit();
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            header('Location: login.php?error=1');
            exit();
        }
    }
}
