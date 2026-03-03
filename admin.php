<?php
// ======================================
// SPUŠTĚNÍ SESSION + OCHRANA STRÁNKY
// ======================================

// Spuštění session (nutné pro práci s přihlášením)
session_start();

// Kontrola, zda je uživatel přihlášen
// a zároveň má roli admin
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    // Pokud ne, přesměrujeme ho na login
    header("Location: login.php");
    exit;
}

// ======================================
// PŘIPOJENÍ K DATABÁZI
// ======================================

// Přihlašovací údaje k databázi
$servername = "dbs.spskladno.cz";
$username   = "student14";
$password   = "spsnet";
$dbname     = "vyuka14";

// Vytvoření připojení pomocí mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Nastavení kódování (správné zobrazení diakritiky)
$conn->set_charset("utf8mb4");

// Kontrola, zda se připojení povedlo
if ($conn->connect_error) {
    exit("Chyba připojení k databázi");
}

// ======================================
// MAZÁNÍ UŽIVATELE
// ======================================

// Pokud byl odeslán formulář pro smazání
if (isset($_POST["delete_id"])) {

    // ID uživatele, který má být smazán
    $deleteId = (int)$_POST["delete_id"];

    // Ochrana: admin nesmí smazat sám sebe
    if ($deleteId !== $_SESSION["user_id"]) {

        // Připravený SQL dotaz (ochrana proti SQL injection)
        $stmt = $conn->prepare(
            "DELETE FROM DHusers WHERE id = ?"
        );

        // Navázání parametru (i = integer)
        $stmt->bind_param("i", $deleteId);

        // Provedení dotazu
        $stmt->execute();

        // Uzavření statementu
        $stmt->close();
    }
}

// ======================================
// NAČTENÍ UŽIVATELŮ
// ======================================

// Výběr všech uživatelů pro admin tabulku
$result = $conn->query(
    "SELECT id, username, role, created_at FROM DHusers"
);

// ======================================
// JOIN – VZTAH M:N (UŽIVATEL × ZBOŽÍ)
// ======================================

// Tento dotaz spojuje:
// DHkosik (M:N tabulka)
// DHusers (uživatelé)
// Zbozi (produkty)
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

<!-- Připojení CSS stylů -->
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>Admin panel</h1>

    <!-- Navigační menu -->
    <?php include "navbar.php"; ?>
</header>

<main class="admin-panel">

    <!-- ====================================== -->
    <!-- TABULKA UŽIVATELŮ -->
    <!-- ====================================== -->
    <h2>Uživatelé</h2>

    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Uživatel</th>
            <th>Role</th>
            <th>Vytvořen</th>
            <th>Akce</th>
        </tr>

        <!-- Výpis uživatelů z databáze -->
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["username"]) ?></td>
            <td><?= $row["role"] ?></td>
            <td><?= $row["created_at"] ?></td>
            <td>

                <!-- Admin nemůže smazat sám sebe -->
                <?php if ($row["id"] !== $_SESSION["user_id"]): ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id"
                               value="<?= $row["id"] ?>">

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

    <!-- ====================================== -->
    <!-- TABULKA KOŠÍKŮ (M:N VZTAH) -->
    <!-- ====================================== -->
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

        <!-- Výpis položek v košících -->
        <?php while ($k = $kosikResult->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($k["username"]) ?></td>
            <td><?= htmlspecialchars($k["Typ"]) ?></td>
            <td><?= htmlspecialchars($k["Velikost"]) ?></td>
            <td><?= $k["Cena"] ?> Kč</td>
            <td><?= $k["mnozstvi"] ?></td>

            <!-- Výpočet ceny za položku -->
            <td><?= $k["Cena"] * $k["mnozstvi"] ?> Kč</td>
        </tr>
        <?php endwhile; ?>
    </table>

</main>

<!-- Patička -->
<?php include "footer.php"; ?>

</body>
</html>

<?php
// Uzavření připojení k databázi
$conn->close();
?>