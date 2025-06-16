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
<body>
<?php include '../Includes/nav.php'; ?>
<main>
    <form action="Search.php" method="get">
        <input type="text" name="search" placeholder="Zoek recepten..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" value="Zoeken">
    </form>
    
    <?php
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        
        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
        
        // Simple search query
        $stmt = $db->prepare('SELECT * FROM Post WHERE Title LIKE ? OR Recipe LIKE ? OR Ingredient LIKE ? OR Tag LIKE ?');
        $searchTerm = '%' . $search . '%';
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
        $posts = $stmt->fetchAll();
        
        // Display results
        if (empty($posts)) {
            echo "<p>Geen recepten gevonden voor '$search'</p>";
        } else {
            echo "<p>" . count($posts) . " recept(en) gevonden:</p>";
            
            foreach ($posts as $post) {
                echo '<div class="search-result">';
                echo '<img src="'.$post['Img'].'" width="100" height="100" alt="Recept afbeelding">';
                echo '<a href="View_Post.php?postid='.$post['PostID'].'">'.$post['Title'].'</a>';
                echo '</div>';
            }
        }
    } else {
        echo "<p>Voer een zoekterm in om recepten te zoeken.</p>";
    }
    ?>

</main>

<?php include '../Includes/footer.php'; ?>

</body>
</html>