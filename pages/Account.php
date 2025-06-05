<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: Login.php');
    exit();
}
?>
<html lang="nl">
<!-- 
Creator: Owen Ramaekers
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pagina</title>
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/account.css">
</head>
<body>
    <?php
    include '../Includes/nav.php';
    echo '<h1>Welkom, ' . $_SESSION['username'] . '</h1>';
    ?>
</body>
</html>