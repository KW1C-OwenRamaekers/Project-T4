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
    <article>
    <h1 id="post-title"><?php echo htmlspecialchars($post['Title'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php
    $stmt = $db->prepare('SELECT Recipe, Ingredient, Tag FROM Post WHERE PostID = ?');
    $stmt->execute([$_GET['postid']]);
    $post = $stmt->fetch();
    ?>
    <div id="post-content">
        <p id="recipe">Recept: <?php echo htmlspecialchars($post['Recipe'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p id="ingredients">Ingredienten: <?php echo htmlspecialchars($post['Ingredient'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p id="tags">Tags: <?php echo htmlspecialchars($post['Tag'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div id="post-author">
        <p>Auteur: <?php
            $stmt = $db->prepare('SELECT Username FROM User WHERE UserID = (SELECT UserID FROM Post WHERE PostID = ?)');
            $stmt->execute([$_GET['postid']]);
            $username = $stmt->fetchColumn();
            echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        ?></p>
        <?php
            // Check if user is admin
            if (isset($_SESSION['userid'])) {
                $stmt = $db->prepare('SELECT IsAdmin FROM User WHERE UserID = ?');
                $stmt->execute([$_SESSION['userid']]);
                $user = $stmt->fetch();
                
                if ($user && $user['IsAdmin']) {
                    // Handle delete request
                    if (isset($_POST['delete_post'])) {
                        $stmt = $db->prepare('DELETE FROM Post WHERE PostID = ?');
                        $stmt->execute([$_GET['postid']]);
                        echo '<script>window.location.href="../index.php";</script>';
                        exit();
                    }
                    ?>
                    <!-- Admin Delete Button -->
                    <div id="admin-controls">
                        <form method="POST" onsubmit="return confirm('Weet je zeker dat je deze post wilt verwijderen?');">
                            <button type="submit" name="delete_post" class="btn btn-danger">Post Verwijderen</button>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
    </article>
    <?php include '../Includes/footer.php'; ?>
</body>
</body>
</html>
