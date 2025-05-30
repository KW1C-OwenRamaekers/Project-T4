<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo 'Welkom, ' . $_SESSION['username'] . '!';
} else {
    header('Location: ../pages/Login.php');
    exit;
}
?>
