<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <a href="about.php">Domů</a>
    <a href="obchod.php">Obchod</a>
    <a href="kontakt.php">Kontakt</a>
    <a href="maturita.php">Maturita</a>
    <a href="kosik.php">Košík </a>

    <?php if (isset($_SESSION["user_id"])): ?>
        <a href="profil.php" class="user">
            <?= htmlspecialchars($_SESSION["username"]) ?>
            
            <?php if ($_SESSION["role"] === "admin"): ?>
    <a href="admin.php">Admin</a>
<?php endif; ?>

        </a>
        <a href="logout.php">Odhlásit</a>
    <?php else: ?>
        <a href="login.php">Přihlášení</a>
        <a href="registrace.php">Registrace</a>
    <?php endif; ?>
</nav>
