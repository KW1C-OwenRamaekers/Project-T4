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
    <h1 class="textitems">Upload recept</h1>
    <form action="upload_post.php" method="post" enctype="multipart/form-data">
        <label for="title" class="textitems">Titel:</label>
        <input type="text" name="title" id="title" required>
        <label for="recipe" class="textitems">Recept:</label>
        <textarea name="recipe" id="recipe" rows="10" cols="50" required></textarea>
        <label for="ingredients" class="textitems">Ingredienten:</label>
        <textarea name="ingredients" id="ingredients" rows="10" cols="50" required></textarea>
        <label for="tags" class="textitems">Tags:</label>
        <input type="text" name="tags" id="tags" required>
        <label for="img" class="textitems">Afbeelding:</label>
        <input type="text" name="img" id="img" placeholder="http://cloud.com/Snack.png" required>
        <input type="submit" value="Upload">
    </form>
    </div>
    <?php include '../Includes/footer.php'; ?>
</body>
</html>