<?php
session_start();
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
    <link rel="stylesheet" href="../Styles/Core.css">
    <link rel="stylesheet" href="../Styles/search.css">
</head>
<?php
include '../Includes/nav.php';
?>

<main>
    <form action="../SearchResult.php" method="get">
        <input type="text" name="search" placeholder="Zoek recepten..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <input type="submit" value="Zoeken">
    </form>
    <?php
        if (empty($_GET['search'])) {
            $db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
            $stmt = $db->prepare('SELECT * FROM Post');
            $stmt->execute();
            $posts = $stmt->fetchAll();

            foreach ($posts as $post) {
                echo '<p><img src="'.$post['Img'].'" width="100" height="100" alt="Image voor recept"><a href="../View_Post.php?postid='.$post['PostID'].'">'.$post['Title'].'</a></p>';
            }
        }
    ?>
</main>

<?php include '../Includes/footer.php'; ?>

