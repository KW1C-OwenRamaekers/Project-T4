<!DOCTYPE html>
<!--
Naam: Owen Ramaekers
Datum: 23-05-2025
-->
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking.com</title>
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/login.css">
</head>
<?php
include '../Includes/nav.php';
?>
<main>
    <form action="../Includes/login.inc.php" method="post">
        <h1>Inloggen</h1>
        <input type="text" name="uid" placeholder="Gebruikersnaam">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <input type="submit" value="Inloggen">
    </form>
    <p><a href="Register.php">Nog geen account?</a></p>
</main>
<?php include '../Includes/footer.php'; ?>
