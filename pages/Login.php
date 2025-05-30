<?php
// If the show parameter is set to 'Register', display the registration form
// Otherwise, display the login form
if (isset($_GET['show']) && $_GET['show'] == 'register') {
    $title = 'Registreren';
    $action = '../Includes/register.inc.php';
    $link = 'Login.php';
    $linkText = 'Al een account?';
} else {
    $title = 'Inloggen';
    $action = '../Includes/login.inc.php';
    $link = 'Login.php?show=register';
    $linkText = 'Nog geen account?';
}
?>
<!DOCTYPE html>
<!--
Naam: Owen Ramaekers
Datum: 23-05-2025
-->
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Cooking.com</title>
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/login.css">
</head>
<?php
// Include the navigation bar
include '../Includes/nav.php';
?>
<main>
    <!-- Form for logging in/registering -->
    <form action="<?= $action ?>" method="post">
        <h1><?= $title ?></h1>
        <input type="text" name="uid" placeholder="Gebruikersnaam">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <input type="submit" value="<?= $title ?>">
    </form>
    <!-- Link to the other form (login/register) -->
    <p><a href="<?= $link ?>"><?= $linkText ?></a></p>
</main>
<?php
// Include the footer
include '../Includes/footer.php';
?>

