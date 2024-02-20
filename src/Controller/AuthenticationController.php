<?php

namespace App\Controller;

use App\Model\User;

class AuthenticationController
{
    public function register($email, $password, $fullname)
    {
        // Vérifier si l'utilisateur existe déjà
        if ($this->findOneByEmail($email)) {
            return "Un utilisateur avec cet email existe déjà.";
        }

        // Les données sont valides, créer un nouvel utilisateur
        $user = new User();
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT)); // Utilisez un hachage sécurisé
        $user->setFullname($fullname);
        $user->setRole(['ROLE_USER']); // Le rôle par défaut

        // Ajouter l'utilisateur en base de données
        $createdUser = $user->create();

        if ($createdUser) {
            return "Inscription réussie !";
        } else {
            return "Une erreur est survenue lors de l'inscription.";
        }
    }

    private function findOneByEmail($email)
    {
        $user = new User();
        return $user->findOneByEmail($email);
    }
}
