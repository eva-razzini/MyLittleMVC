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

    <h3>Update Profile</h3>
    <form action="update_profile.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user->getEmail(); ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" value="<?php echo $user->getFullName(); ?>" required><br>

        <input type="submit" value="Update Profile">
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>
