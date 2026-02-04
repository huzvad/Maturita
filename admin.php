<?php
// ============================
// SPUŠTĚNÍ SESSION + OCHRANA
// ============================
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}

// ============================
// PŘIPOJENÍ K DATABÁZI
// ============================
$servername = "dbs.spskladno.cz";
$username = "student14";
$password = "spsnet";
$dbname = "vyuka14";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    exit("Chyba připojení k databázi");
}

// ============================
// MAZÁNÍ UŽIVATELE
// ============================
if (isset($_POST["delete_id"])) {
    $deleteId = (int)$_POST["delete_id"];

    // admin nesmí smazat sám sebe
    if ($deleteId !== $_SESSION["user_id"]) {
        $stmt = $conn->prepare(
            "DELETE FROM DHusers WHERE id = ?"
        );
        $stmt->bind_param("i", $deleteId);
        $stmt->execute();
        $stmt->close();
    }
}

// ============================
// NAČTENÍ UŽIVATELŮ
// ============================
$result = $conn->query(
    "SELECT id, username, role, created_at FROM DHusers"
);

// ============================
// JOIN – KDO MÁ CO V KOŠÍKU
// ============================
$kosikResult = $conn->query(
    "SELECT 
        u.username,
        z.Typ,
        z.Velikost,
        z.Cena,
        k.mnozstvi
     FROM DHkosik k
     JOIN DHusers u ON k.user_id = u.id
     JOIN Zbozi z ON k.zbozi_id = z.id
     ORDER BY u.username"
);
?>

<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin panel</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>Admin panel</h1>
    <?php include "navbar.php"; ?>
</header>

<main class="admin-panel">

    <!-- ============================ -->
    <!-- UŽIVATELÉ -->
    <!-- ============================ -->
    <h2>Uživatelé</h2>

    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Uživatel</th>
            <th>Role</th>
            <th>Vytvořen</th>
            <th>Akce</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["username"]) ?></td>
            <td><?= $row["role"] ?></td>
            <td><?= $row["created_at"] ?></td>
            <td>
                <?php if ($row["id"] !== $_SESSION["user_id"]): ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $row["id"] ?>">
                        <button class="delete-btn"
                                onclick="return confirm('Opravdu smazat?')">
                            Smazat
                        </button>
                    </form>
                <?php else: ?>
                    —
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- ============================ -->
    <!-- KOŠÍKY (M:N VZTAH) -->
    <!-- ============================ -->
    <h2>Košíky uživatelů</h2>

    <table class="admin-table">
        <tr>
            <th>Uživatel</th>
            <th>Typ</th>
            <th>Velikost</th>
            <th>Cena</th>
            <th>Množství</th>
            <th>Celkem</th>
        </tr>

        <?php while ($k = $kosikResult->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($k["username"]) ?></td>
            <td><?= htmlspecialchars($k["Typ"]) ?></td>
            <td><?= htmlspecialchars($k["Velikost"]) ?></td>
            <td><?= $k["Cena"] ?> Kč</td>
            <td><?= $k["mnozstvi"] ?></td>
            <td><?= $k["Cena"] * $k["mnozstvi"] ?> Kč</td>
        </tr>
        <?php endwhile; ?>
    </table>

</main>

<?php include "footer.php"; ?>

</body>
</html>

<?php
$conn->close();
?>
