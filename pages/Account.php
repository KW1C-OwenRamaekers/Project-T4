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
    <button><a href="create_post.php">Post een recept</a></button>
    <a id="logout-button" href="logout.php">Logout</a>
</body>
</html>