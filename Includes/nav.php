    <nav>
        <h1>Cooking.com</h1>
        <ul id="nav-top">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../pages/Search.php">Search</a></li>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<li><a href="../pages/Account.php">Account</a></li>';
            } else {
                echo '<li><a href="../pages/Login.php?show=login">Login</a></li>';
                echo '<li><a href="../pages/Login.php?show=register">Register</a></li>';
            }
            ?>
        </ul>
    </nav>