<?php
session_start();

if (!isset($_SESSION['userid'])) {
    die('Error: User not logged in.');
}

$db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
$stmt = $db->prepare("INSERT INTO Post (UserID, Title, Recipe, Ingredient, Tag, Img) VALUES (:userid, :title, :recipe, :ingredient, :tag, :img)");
$stmt->execute([
    ':userid' => $_SESSION['userid'],
    ':title' => $_POST['title'],
    ':recipe' => $_POST['recipe'],
    ':ingredient' => $_POST['ingredients'],
    ':tag' => $_POST['tags'],
    ':img' => $_POST['img']
]);

header('Location: ../index.php?upload=success');
exit();
?>

