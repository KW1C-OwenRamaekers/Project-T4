<?php
session_start();

if (!isset($_SESSION['userid'])) {
    die('Error: User not logged in.');
}

$db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
$stmt = $db->prepare("INSERT INTO Post (PostID, UserID, Title, Img, Date, Servings, PrepTime, CookTime, Recipe, Ingredient, Tag) VALUES (NULL, :userid, :title, :img, NOW(), :servings, :preptime, :cooktime, :recipe, :ingredient, :tag)");
$stmt->execute([
    ':userid' => $_SESSION['userid'],
    ':title' => $_POST['title'],
    ':img' => $_POST['img'],
    ':servings' => $_POST['servings'],
    ':preptime' => $_POST['preptime'],
    ':cooktime' => $_POST['cooktime'],
    ':recipe' => $_POST['recipe'],
    ':ingredient' => $_POST['ingredients'],
    ':tag' => $_POST['tags']
]);

header('Location: ../index.php?upload=success');
exit();
?>

