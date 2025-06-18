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
</head>
<body>
    <?php if (isset($_GET['upload']) && $_GET['upload'] == 'success'): ?>
        <script>alert('Je recept is succesvol geupload!');</script>
    <?php endif; ?>
    <?php include 'Includes/nav.php'; ?>
    <main>
        <div id="welcome">
            <h1>Welkom op Cooking.com</h1>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <button><a id="post-button" href="pages/create_post.php">Post een recept</a></button>
            <?php else: ?>
                <p>Log in om een recept te posten.</p>
            <?php endif; ?>
        </div>
        <div id="posts">
            <?php
            $stmt = $db->prepare('SELECT * FROM Post');
            $stmt->execute();
            $posts = $stmt->fetchAll();

            foreach ($posts as $post) {
                echo '<article>';
                echo '<div class="post">';
                echo '<img src="'.$post['Img'].'" alt="Image voor recept" width="200px" class="post-img">';
                echo '<h2><a href="pages/View_Post.php?postid='.$post['PostID'].'" class="post-title">'.$post['Title'].'</a></h2>';
                echo '<p class="post-recipe">'.substr($post['Recipe'], 0, 35).'...</p>';
                echo '<p class="post-date">'.$post['Date'].'</p>';
                echo '<p class="post-author">Auteur: ';
                $stmt = $db->prepare('SELECT Username FROM User WHERE UserID = (SELECT UserID FROM Post WHERE PostID = ?)');
                $stmt->execute([$post['PostID']]);
                $username = $stmt->fetchColumn();
                echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
                echo '</p>';
                echo '</div>';
                echo '</article>';
            }
            ?>
        </div>
    </main>
    <?php include 'Includes/footer.php'; ?>
</body>
</html>
