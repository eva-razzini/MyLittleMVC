<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h2>User Profile</h2>

    <p>Welcome, <?php echo $user->getFullName(); ?>!</p>
    <p>Email: <?php echo $user->getEmail(); ?></p>
    <!-- Affichez d'autres informations du profil au besoin -->

    <h2>Modifier le profil</h2>

<?php if (isset($updateError)): ?>
    <p style="color: red;"><?php echo $updateError; ?></p>
<?php endif; ?>

<form method="post" action="">
    <label for="new_email">Nouvel email:</label>
    <input type="email" id="new_email" name="new_email" required>
    <br>

    <label for="new_password">Nouveau mot de passe:</label>
    <input type="password" id="new_password" name="new_password">
    <br>

    <label for="new_fullname">Nouveau nom complet:</label>
    <input type="text" id="new_fullname" name="new_fullname">
    <br>

    <button type="submit">Mettre à jour</button>
</form>

    <a href="logout.php">Logout</a>
</body>
</html>
