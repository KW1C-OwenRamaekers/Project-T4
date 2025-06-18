<footer id="footer">
    <p class="time"><?php echo "De huidige tijd is: " . date("H:i:s"); ?></p>    
    <?php if (isset($_SESSION['username'])): ?>
        <p class="user">Gebruiker: <?= $_SESSION['username'] ?></p>
    <?php endif; ?>
    <p class="copyright">&copy; <?php echo date('Y'); ?> Owen Ramaekers</p>
</footer>

