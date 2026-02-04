<?php
session_start(); // spuštění session (nutné pro přihlášení)

$servername = "dbs.spskladno.cz";
$username = "student14";
$password = "spsnet";
$dbname = "vyuka14";

// připojení k databázi
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    exit("Spojení se nezdařilo: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = trim($_POST["username"]);
    $pass = $_POST["password"];

    // vyhledání uživatele v databázi
    $stmt = $conn->prepare(
        "SELECT id, password_hash, role FROM DHusers WHERE username = ?"
    );
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    // pokud uživatel existuje
    if ($stmt->num_rows === 1) {

        $stmt->bind_result($id, $hash, $role);
        $stmt->fetch();

        // ověření hesla
        if (password_verify($pass, $hash)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $user;
            $_SESSION["role"] = $role;

            $message = "Přihlášení úspěšné ✅";
            // header("Location: obchod.php"); // případné přesměrování
        } else {
            $message = "Špatné heslo ❌";
        }

    } else {
        $message = "Uživatel neexistuje ❌";
    }

    $stmt->close();
}
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Přihlášení</title>

<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
  <h1>Stylové Oblečení</h1>
  <?php 

include "navbar.php";

?>
</header>

<main>
  <h2>Přihlášení</h2>

  <form method="post">
    <input type="text" name="username" placeholder="Uživatelské jméno" required>
    <input type="password" name="password" placeholder="Heslo" required>
    <button type="submit">Přihlásit se</button>
  </form>

  <?php if ($message): ?>
    <div class="message"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>
</main>

<?php 

include "footer.php";

?>

</body>
</html>
