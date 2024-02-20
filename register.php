<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form action="process_register.php" method="post">
    <!-- Fullname -->
    <label for="fullname">Fullname:</label>
    <input type="text" id="fullname" name="fullname" required>
    <br>

    <!-- Email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>

    <!-- Password -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>

    <!-- Confirm Password -->
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <br>

    <!-- Submit Button -->
    <input type="submit" value="Register">
</form>

</body>
</html>
