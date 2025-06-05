<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
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
    <title>Cooking.com</title>
    <link rel="stylesheet" href="Styles/Core.css">
    <link rel="stylesheet" href="Styles/index.css">
    <script src="Scripts/index.js" defer></script>
</head>
<body>
    <?php include 'Includes/nav.php'; ?>
    <main>
        <div id="welcome">
            <h1>Welkom op Cooking.com</h1>
            <button><a id="post-button" href="#">Post een recept</a></button>
        </div>
        <div id="posts">
            <?php
            $stmt = $db->prepare('SELECT * FROM Post');
            $stmt->execute();
            $posts = $stmt->fetchAll();

            foreach ($posts as $post) {
                echo '<div class="post">';
                echo '<h2><a href="View_Post.php?postid='.$post['PostID'].'">'.$post['Recipe'].'</a></h2>';
                echo '<p>'.substr($post['Recipe'], 0, 15).'...</p>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
    <?php include 'Includes/footer.php'; ?>
</body>
</html>
