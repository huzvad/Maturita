<?php
$servername = "dbs.spskladno.cz";
$username = "student14";
$password = "spsnet";
$dbname = "vyuka14";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    exit("Spojení se nezdařilo: " . $conn->connect_error);
}

// Vybereme každý typ pouze jednou
$sql = "
    SELECT Typ, MIN(Cena) AS Cena
    FROM Zbozi
    GROUP BY Typ
    LIMIT 8
";

$result = $conn->query($sql);

// Obrázky podle typu
$images = [
    "Dámská mikina" => "images/mikina-damska.jpg",
    "Pánská mikina" => "images/mikina-panska.jpg",
    "Dámské tričko" => "images/tricko-damske.jpg",
    "Pánské tričko" => "images/tricko-panske.jpg",
    "Sportovní kalhoty" => "images/kalhoty-sportovni.jpg",
    "Čepice" => "images/cepice.jpg",
    "Ponožky" => "images/ponozky.jpg",
    "Rukavice" => "images/rukavice.jpg"
];

// Odkazy na HTML verzi produktů
$links = [
    "Dámská mikina" => "produkt-mikina-damska.php",
    "Pánská mikina" => "produkt-mikina-panska.php",
    "Dámské tričko" => "produkt-tricko-damske.php",
    "Pánské tričko" => "produkt-tricko-panske.php",
    "Sportovní kalhoty" => "produkt-kalhoty.php",
    "Čepice" => "produkt-cepice.php",
    "Ponožky" => "produkt-ponozky.php",
    "Rukavice" => "produkt-rukavice.php"
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

include "navbar.php";

?>

  </header>

  <section class="hero">
    <h2>Naše nabídka</h2>
    <p>Vyberte si z nejnovější kolekce stylového oblečení.</p>
  </section>

  <section class="products">

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $typ = trim($row["Typ"]);
        $cena = $row["Cena"];

        $img = $images[$typ] ?? "https://via.placeholder.com/300x230?text=Obrázek";
        $link = $links[$typ] ?? "#";

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
    echo '<p>Žádné produkty nenalezeny.</p>';
}

$conn->close();
?>
</section>

<?php 

include "footer.php";

?>

</body>
</html>
