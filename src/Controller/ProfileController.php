<?php

namespace App\Controller;

use App\Model\User;

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
            
            // Assurez-vous d'ajouter la logique de hachage du mot de passe
            if (!empty($password)) {
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            }

            $user->setFullname($fullname);

            // Mettre à jour en base de données
            $updated = $user->update();

            if ($updated) {
                // Mettre à jour en SESSION
                $_SESSION['user'] = $user;

                // Rediriger vers la page de profil
                header('Location: profile.php?success=Profil mis à jour avec succès.');
                exit();
            } else {
                // Une erreur s'est produite lors de la mise à jour en base de données
                header('Location: profile.php?error=Une erreur est survenue lors de la mise à jour du profil.');
                exit();
            }
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            header('Location: login.php?error=1');
            exit();
        }
    }
}
