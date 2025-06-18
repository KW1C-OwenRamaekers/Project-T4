<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');

// If the show parameter is set to 'Register', display the registration form
// Otherwise, display the login form
if (isset($_GET['show']) && $_GET['show'] == 'register') {
    $title = 'Registreren';
    $link = 'Login.php';
    $linkText = 'Al een account?';
    $action = 'Register.php'; // Set action for registration
} else {
    $title = 'Inloggen';
    $link = 'Login.php?show=register';
    $linkText = 'Nog geen account?';
    $action = 'Login.php'; // Set action for login
}

if (isset($_POST['uid']) && isset($_POST['pwd'])) {
    $stmt = $db->prepare("SELECT * FROM User WHERE Username = :uid");
    $stmt->execute(['uid' => $_POST['uid']]);
    $user = $stmt->fetch();

    if ($user && $user['Password'] == $_POST['pwd']) 
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['Username'];
        $_SESSION['userid'] = $user['UserID'];
        $_SESSION['IsAdmin'] = $user['IsAdmin'];
        header('Location: account.php'); // Redirect to account dashboard after login
        exit;
    } 
    else 
    {
       $badpswd = '<p class="error">Gebruikersnaam en/of wachtwoord incorrect!</p>';
    }
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
    <form action="<?= $action ?>" method="post">
        <h1><?= $title ?></h1>
        <input type="text" name="uid" placeholder="Gebruikersnaam" autocomplete="username">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <input type="submit" value="<?= $title ?>">
    </form>
    <?= isset($badpswd) ? $badpswd : '' ?>
    <p><a href="<?= $link ?>"><?= $linkText ?></a></p>
</main>
<?php
// Include the footer
include '../Includes/footer.php';
?>

