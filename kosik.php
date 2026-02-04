<?php
// Spuštění session – nutné pro práci s $_SESSION (uživatel, košík)
session_start();

/* =====================================================
   ODEBRÁNÍ POLOŽKY Z KOŠÍKU
   ===================================================== */

// Kontrola, zda:
// 1) byl odeslán formulář metodou POST
// 2) existuje tlačítko "remove"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["remove"])) {

    // Index položky v košíku (pozice v poli)
    $index = (int)$_POST["index"];

    // Pokud položka s tímto indexem v košíku existuje
    if (isset($_SESSION["kosik"][$index])) {

        // Odebrání položky z košíku
        unset($_SESSION["kosik"][$index]);

        // Přeindexování pole (aby indexy šly 0,1,2,3...)
        $_SESSION["kosik"] = array_values($_SESSION["kosik"]);
    }

    // Přesměrování zpět na stránku košíku
    header("Location: kosik.php");
    exit;
}
?>

<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <!-- Responzivní zobrazení -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Košík – Stylové Oblečení</title>

  <!-- Připojení CSS stylů -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Stylové Oblečení</h1>

  <!-- Navigační menu -->
  <?php include "navbar.php"; ?>
</header>

<section class="hero">
  <h2>Váš košík</h2>
  <p>Přehled produktů, které jste si vybrali</p>
</section>

<section class="products">

<?php
/* =====================================================
   KONTROLA PŘIHLÁŠENÍ UŽIVATELE
   ===================================================== */

// Pokud uživatel NENÍ přihlášen
if (!isset($_SESSION["user_id"])) {
    echo "
    <div class='product'>
      <div class='product-info'>
        <h3>Nejste přihlášen</h3>
        <p>Pro použití košíku se musíte nejdříve přihlásit.</p>
      </div>
    </div>";

    // Ukončí vykreslování stránky
    exit;
}

/* =====================================================
   PRÁZDNÝ KOŠÍK
   ===================================================== */

// Pokud je košík prázdný
if (empty($_SESSION["kosik"])) {
    echo "
    <div class='product'>
      <div class='product-info'>
        <h3>Košík je prázdný</h3>
        <p>Zatím tu nemáte žádné produkty.</p>
      </div>
    </div>";

    exit;
}

/* =====================================================
   VÝPIS OBSAHU KOŠÍKU
   ===================================================== */

// Celková cena košíku
$celkem = 0;

// Procházení všech položek v košíku
foreach ($_SESSION["kosik"] as $index => $item) {

    // Mezisoučet = cena * počet kusů
    $mezisoucet = $item["cena"] * $item["ks"];

    // Přičtení do celkové ceny
    $celkem += $mezisoucet;

    echo "
    <div class='product'>
      <div class='product-info' style='position:relative;'>

        <!-- Formulář pro odebrání položky -->
        <form method='post' style='position:absolute;top:10px;right:10px;'>
          <input type='hidden' name='index' value='{$index}'>
          <button type='submit' name='remove'
            style='
              background:none;
              border:none;
              color:#e74c3c;
              font-size:18px;
              font-weight:bold;
              cursor:pointer;
            '
            title='Odstranit položku'>
            ✖
          </button>
        </form>

        <!-- Název produktu -->
        <h3>{$item["nazev"]}</h3>

        <!-- Velikost produktu -->
        <p>Velikost: {$item["velikost"]}</p>

        <!-- Cena za danou položku -->
        <div class='price'>{$mezisoucet} Kč</div>

      </div>
    </div>";
}

/* =====================================================
   CELKOVÁ CENA
   ===================================================== */

echo "
<div class='product'>
  <div class='product-info'>
    <h3>Celkem</h3>
    <div class='price'>{$celkem} Kč</div>
  </div>
</div>";
?>

</section>

<!-- Patička stránky -->
<?php include "footer.php"; ?>

</body>
</html>
