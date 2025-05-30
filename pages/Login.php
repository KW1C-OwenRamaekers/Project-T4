<?php
// Connect to the database
$dsn = 'mysql:host=localhost;dbname=recipe_db';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

// If the show parameter is set to 'Register', display the registration form
// Otherwise, display the login form
if (isset($_GET['show']) && $_GET['show'] == 'register') {
    $title = 'Registreren';
    $action = '../pages/Account.php';
    $link = 'Login.php';
    $linkText = 'Al een account?';
} else {
    $title = 'Inloggen';
    $action = '../pages/Account.php';
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
        <input type="text" name="uid" placeholder="Gebruikersnaam" autocomplete="username">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <input type="submit" value="<?= $title ?>">
    </form>
    <!-- Link to the other form (login/register) -->
    <p><a href="<?= $link ?>"><?= $linkText ?></a></p>
</main>

<?php
// If the submit button was clicked, check if the user exists and the password is correct
if (isset($_POST['uid']) && isset($_POST['pwd'])) {
    $stmt = $db->prepare('SELECT * FROM User WHERE Username = :username');
    $stmt->execute(['username' => $_POST['uid']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['pwd'], $user['Password'])) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['Username'];
        $_SESSION['userid'] = $user['UserID'];
        header('Location: ../index.php');
        exit;
    } else {
        echo '<p class="error">Gebruikersnaam en/of wachtwoord incorrect!</p>';
    }
}
// Include the footer
include '../Includes/footer.php';
?>

