<?php
session_start();
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload post</title>
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/create_post.css">
</head>
<body>
    <?php include '../Includes/nav.php'; ?>
    <div id="create-post">
    <h1>Upload recept</h1>
    <form action="upload_post.php" method="post" enctype="multipart/form-data">
        <label for="title">Titel:</label>
        <input type="text" name="title" id="title" required>
        <label for="recipe">Recept:</label>
        <input type="text" name="recipe" id="recipe" required>
        <label for="ingredients">Ingredienten:</label>
        <input type="text" name="ingredients" id="ingredients" required>
        <label for="tags">Tags:</label>
        <input type="text" name="tags" id="tags" required>
        <label for="img">Afbeelding:</label>
        <input type="text" name="img" id="img" placeholder="http://cloud.com/Snack.png" required>
        <input type="submit" value="Upload">
    </form>
    </div>
</body>
</html>