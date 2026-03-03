<?php
// ============================
// PŘIPOJENÍ K DATABÁZI
// ============================

// údaje pro připojení k MySQL databázi
$servername = "dbs.spskladno.cz";
$username   = "student14";
$password   = "spsnet";
$dbname     = "vyuka14";

// vytvoření připojení
$conn = new mysqli($servername, $username, $password, $dbname);

// nastavení kódování (čeština, diakritika)
$conn->set_charset("utf8mb4");

// kontrola, zda se připojení povedlo
if ($conn->connect_error) {
    exit("Spojení se nezdařilo: " . $conn->connect_error);
}

// ============================
// VÝBĚR PRODUKTŮ
// ============================

// vybere každý typ zboží pouze jednou
// použije nejnižší cenu daného typu
$sql = "
    SELECT Typ, MIN(Cena) AS Cena
    FROM Zbozi
    GROUP BY Typ
    LIMIT 8
";

// provedení SQL dotazu
$result = $conn->query($sql);

// ============================
// OBRÁZKY PODLE TYPU ZBOŽÍ
// ============================

// pole, které přiřazuje typ zboží ke konkrétnímu obrázku
$images = [
    "Dámská mikina"       => "images/mikina-damska.jpg",
    "Pánská mikina"      => "images/mikina-panska.jpg",
    "Dámské tričko"      => "images/tricko-damske.jpg",
    "Pánské tričko"      => "images/tricko-panske.jpg",
    "Sportovní kalhoty"  => "images/kalhoty-sportovni.jpg",
    "Čepice"             => "images/cepice.jpg",
    "Ponožky"            => "images/ponozky.jpg",
    "Rukavice"           => "images/rukavice.jpg"
];

// ============================
// ODKAZY NA DETAIL PRODUKTŮ
// ============================

// pole, které přiřazuje typ zboží k HTML/PHP stránce produktu
$links = [
    "Dámská mikina"       => "produkt-mikina-damska.php",
    "Pánská mikina"      => "produkt-mikina-panska.php",
    "Dámské tričko"      => "produkt-tricko-damske.php",
    "Pánské tričko"      => "produkt-tricko-panske.php",
    "Sportovní kalhoty"  => "produkt-kalhoty.php",
    "Čepice"             => "produkt-cepice.php",
    "Ponožky"            => "produkt-ponozky.php",
    "Rukavice"           => "produkt-rukavice.php"
];
?>

<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Obchod – Stylové Oblečení</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
  <h1>Stylové Oblečení</h1>

  <?php
  // navigační lišta (menu, košík, přihlášení…)
  include "navbar.php";
  ?>
</header>

<!-- ============================ -->
<!-- HERO SEKCE -->
<!-- ============================ -->
<section class="hero">
  <h2>Naše nabídka</h2>
  <p>Vyberte si z nejnovější kolekce stylového oblečení.</p>
</section>

<!-- ============================ -->
<!-- VÝPIS PRODUKTŮ -->
<!-- ============================ -->
<section class="products">

<?php
// pokud databáze vrátila nějaké produkty
if ($result->num_rows > 0) {

    // projdeme všechny řádky výsledku
    while ($row = $result->fetch_assoc()) {

        // typ zboží (např. Dámská mikina)
        $typ = trim($row["Typ"]);

        // cena (nejnižší pro daný typ)
        $cena = $row["Cena"];

        // obrázek podle typu, fallback placeholder
        $img = $images[$typ] ?? "https://via.placeholder.com/300x230?text=Obrázek";

        // odkaz na detail produktu
        $link = $links[$typ] ?? "#";

        // výpis jednoho produktu
        echo "
        <a href='$link' class='product'>
            <img src='$img' alt='$typ'>
            <div class='product-info'>
                <h3>$typ</h3>
                <div class='price'>{$cena} Kč</div>
            </div>
        </a>
        ";
    }

} else {
    // pokud databáze nevrátí žádná data
    echo '<p>Žádné produkty nenalezeny.</p>';
}

// uzavření připojení k DB
$conn->close();
?>

</section>

<?php
// patička stránky
include "footer.php";
?>

</body>
</html>