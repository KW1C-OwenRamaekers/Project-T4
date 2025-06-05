<?php
session_start();
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
    <form action="../pages/Login.php" method="post">
        <input type="submit" name="logout" value="Uitloggen">
    </form>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: ../pages/Login.php');
        exit;
    }
    ?>
</body>
</html>