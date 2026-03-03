<?php
session_start();

// ochrana stránky – musí být přihlášen
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// připojení k databázi
$conn = new mysqli(
    "dbs.spskladno.cz",
    "student14",
    "spsnet",
    "vyuka14"
);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    exit("Chyba připojení k databázi");
}

// ID přihlášeného uživatele
$userId = $_SESSION["user_id"];

// načtení údajů o uživateli
$stmt = $conn->prepare("
    SELECT username, role, created_at
    FROM DHusers
    WHERE id = ?
");
$stmt->bind_param("i", $userId);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// ============================
// POČET POLOŽEK V KOŠÍKU (SESSION)
// ============================

$pocetKosik = 0;

if (isset($_SESSION["kosik"])) {
    foreach ($_SESSION["kosik"] as $item) {
        $pocetKosik += $item["ks"];
    }
}

$conn->close();
?>

<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<title>Můj profil</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>Můj profil</h1>
    <?php include "navbar.php"; ?>
</header>

<main class="profile">
    <h2>Informace o účtu</h2>

    <ul class="profile-info">
        <li><strong>Uživatelské jméno:</strong> <?= htmlspecialchars($user["username"]) ?></li>
        <li><strong>Role:</strong> <?= htmlspecialchars($user["role"]) ?></li>
        <li><strong>Registrován:</strong> <?= $user["created_at"] ?></li>
        <li><strong>Položky v košíku:</strong> <?= $pocetKosik ?></li>
    </ul>

    <p class="profile-note">
        Tato stránka zobrazuje informace o aktuálně přihlášeném uživateli.
        Obsah košíku je načítán ze session, což umožňuje rychlou odezvu aplikace.
    </p>
</main>

<?php include "footer.php"; ?>

</body>
</html>