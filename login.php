<?php

require_once 'vendor/autoload.php';

use App\Controller\AuthenticationController;

$authController = new AuthenticationController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire s'il a été soumis
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = $authController->login($password, $email);

    if ($result === true) {
        // Authentification réussie, rediriger vers shop.php
        header('Location: shop.php');
        exit();
    } else {
        // Authentification échouée, afficher le message d'erreur
        $errorMessage = $result;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if (isset($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
