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
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/search.css">
</head>
<?php
include '../Includes/nav.php';
?>

<main>
    <form action="../SearchResult.php" method="get">
        <input type="text" name="search" placeholder="Zoek recepten...">
        <input type="submit" value="Zoeken">
    </form>
    <?php
        if (empty($_GET['search'])) {
            $db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
            $stmt = $db->prepare('SELECT * FROM Post');
            $stmt->execute();
            $posts = $stmt->fetchAll();

            foreach ($posts as $post) {
                echo '<p><a href="../View_Post.php?postid='.$post['PostID'].'">'.$post['Recipe'].'</a></p>';
            }
        } else {
            $search = $_GET['search'];
            header("Location: ../SearchResult.php?search=$search");
            exit;
        }
    ?>
</main>

<?php include '../Includes/footer.php'; ?>

