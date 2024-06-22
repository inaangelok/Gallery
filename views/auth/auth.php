<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="../assets/auth/css/auth.css">
</head>
<body>
<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
        <header>Login</header>
        <?php

        $session = new Session();
        if (isset($_SESSION['error'])) {
            ?>
            <p class="error_message"><?= $_SESSION['error'] ?></p>
            <?php
        }
        ?>
        <form action="/user/login" method="post">
            <input type="email" placeholder="Enter your email" name="email">
            <input type="password" placeholder="Enter your password" name="password">
            <a href="#">Forgot password?</a>
            <input type="submit" class="button" value="Login">
        </form>
        <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
        </div>
    </div>
    <div class="registration form">
        <header>Signup</header>
        <?php

        $session = new Session();
        if (isset($_SESSION['error'])) {
            ?>
            <p class="error_message"><?= $_SESSION['error'] ?></p>
            <?php
        }
        ?>
        <form action="/user/register" method="post">
            <input type="text" placeholder="Enter your email" name="email">
            <input type="text" placeholder="First name" name="name">
            <input type="text" placeholder="Second name" name="surname">
            <input type="password" placeholder="Create a password" name="password">
            <input type="password" placeholder="Confirm your password" name="password2">
            <input type="submit" class="button" value="Signup">
        </form>
        <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
        </div>
    </div>
</div>
</body>
</html>