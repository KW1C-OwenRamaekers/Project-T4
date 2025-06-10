<?php
if (isset($_POST['uid']) && isset($_POST['pwd'])) {
    $user = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $db = new PDO('mysql:host=localhost;dbname=recipe_db', 'root', '');
    $stmt = $db->prepare("INSERT INTO User (Username, Password) VALUES (:user, :pwd)");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->execute();
    header('Location: Login.php');
    exit;
}
?>
