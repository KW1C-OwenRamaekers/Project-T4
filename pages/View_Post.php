<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
$stmt = $db->prepare('SELECT Title FROM Post WHERE PostID = ?');
$stmt->execute([$_GET['postid']]);
$post = $stmt->fetch();
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post van <?php
        $stmt = $db->prepare('SELECT Username FROM User WHERE UserID = (SELECT UserID FROM Post WHERE PostID = ?)');
        $stmt->execute([$_GET['postid']]);
        $username = $stmt->fetchColumn();
        echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    ?></title>
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/Post.css">
</head>
<body>
    <?php include '../Includes/nav.php'; ?>
    <div class="post-title">
        <?php echo htmlspecialchars($post['Title'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <h1 class="post-heading"><?php echo htmlspecialchars($post['Title'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php
    $stmt = $db->prepare('SELECT Recipe, Ingredient, Tag FROM Post WHERE PostID = ?');
    $stmt->execute([$_GET['postid']]);
    $post = $stmt->fetch();
    ?>
    <div class="post-content">
        <p class="recipe">Recept: <?php echo htmlspecialchars($post['Recipe'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="ingredients">Ingredienten: <?php echo htmlspecialchars($post['Ingredient'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="tags">Tags: <?php echo htmlspecialchars($post['Tag'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="post-author">
        <p>Auteur: <?php
            $stmt = $db->prepare('SELECT Username FROM User WHERE UserID = (SELECT UserID FROM Post WHERE PostID = ?)');
            $stmt->execute([$_GET['postid']]);
            $username = $stmt->fetchColumn();
            echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        ?></p>
    </div>
    <?php include '../Includes/footer.php'; ?>
</body>
</body>
</html>
