<?php
$servername = "dbs.spskladno.cz";
$username = "student14";
$password = "spsnet";
$dbname = "vyuka14";
//připojení k databázi

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
//přihlašovací údaje k databázi mysql

if ($conn->connect_error) {
    exit("Spojení se nezdařilo: " . $conn->connect_error);
}
//Pokud se databáze nepřipojí, skript se okamžitě ukončí a vypíše chybu.

$message = "";
//Proměnná pro zprávy

if ($_SERVER["REQUEST_METHOD"] === "POST") { //Zpracování formuláře (POST)
    $user = trim($_POST["username"]); //trim() odstraní mezery z kraje jména
    $pass = $_POST["password"];  //Heslo se zatím nehashuje

    if (strlen($user) < 3 || strlen($pass) < 4) {   //kontrola dělky
        $message = "Jméno nebo heslo je příliš krátké.";
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT); //hashovani hesla

        $stmt = $conn->prepare(
            "INSERT INTO DHusers (username, password_hash) VALUES (?, ?)" //uložení do databáze
        );
        $stmt->bind_param("ss", $user, $hash); //ss = dvě proměnné typu string, dosadí se uživatelské jméno a hash hesla

        if ($stmt->execute()) {  //uložení do db
            $message = "Registrace proběhla úspěšně ✅";
        } else {
            $message = "Uživatel už existuje ❌";
        }

        $stmt->close(); //uzavření do databáze
    }
}
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registrace</title>
  
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
  <h2>Registrace</h2>

  <form method="post">   <!-- Data se posílají metodou POST -->

    <input type="text" name="username" placeholder="Uživatelské jméno" required>
    <input type="password" name="password" placeholder="Heslo" required> <!-- name = klíč, přes který PHP čte hodnoty -->
    <button type="submit">Registrovat</button>
  </form>

  <?php if ($message): ?>
    <div class="message"><?= htmlspecialchars($message) ?></div> <!-- Zpráva se zobrazí jen pokud není prázdná, htmlspecialchars() chrání proti XSS útoku --> 
  <?php endif; ?>
</main>

<?php 

include "footer.php";

?>

</body>
</html>
