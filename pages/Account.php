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
    echo '<h1 id="welcome">Welkom, ' . $_SESSION['username'] . '</h1>';
    ?>
    <button><a href="create_post.php">Post een recept</a></button>
    <h2 id="your-posts">Je posts:</h2>
    <ul class="horizontal-list">
        <?php
        $db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
        $stmt = $db->prepare('SELECT * FROM Post WHERE UserID = :userid');
        $stmt->execute([':userid' => $_SESSION['userid']]);
        $posts = $stmt->fetchAll();
        foreach ($posts as $post) {
            echo '<li>';
            echo '<a href="View_Post.php?postid=' . $post['PostID'] . '">';
            echo '<img src="' . $post['Img'] . '" alt="Image voor recept" width="100" height="100"';
            echo '<p class="post-title">' . $post['Title'] . '</p>';
            echo '</a>';
            echo '</li>';
        }
        ?>
    </ul>
    <a id="logout-button" href="logout.php">Logout</a>
</body>
</html>