<?php
// Spuštění session
// Umožňuje pracovat s přihlášeným uživatelem a košíkem
session_start();
?> 

<!doctype html>
<html lang="cs">
<head>
  <!-- Nastavení kódování znaků -->
  <meta charset="utf-8">

  <!-- Zajišťuje responzivní zobrazení na mobilu -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Titulek stránky -->
  <title>Stylové Oblečení</title>

  <!-- Připojení hlavního CSS souboru -->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- HLAVIČKA STRÁNKY -->
  <header>
    <h1>Stylové Oblečení</h1>

    <?php 
    // Vložení navigačního menu
    // Díky include je menu společné pro celý web
    include "navbar.php";
    ?>
  </header>

  <!-- HERO SEKCE (hlavní úvodní banner) -->
  <section class="hero">
    <h2>Moderní móda pro každý den</h2>
    <p>Stylové a pohodlné kousky, které snadno zkombinujete s čímkoli.</p>

    <!-- Odkaz na stránku s obchodem -->
    <a href="obchod.php">
      <button>Prohlédnout kolekci</button>
    </a>
  </section>

  <!-- NADPIS SEKCE PRODUKTŮ -->
  <h2 style="text-align:center; margin-top:40px;">
    Naše nejprodávanější kousky:
  </h2>

  <!-- SEKCE PRODUKTŮ -->
  <section class="products">

    <!-- PRODUKT 1 – DÁMSKÉ TRIČKO -->
    <!-- Celý blok je klikací odkaz na detail produktu -->
    <a href="produkt-tricko-damske.php" 
       class="product" 
       style="text-decoration:none; color:inherit;">

      <img src="images/tricko-damske.jpg" alt="Dámské tričko">

      <div class="product-info">
        <h3>Dámské tričko</h3>
        <p>Lehké a příjemné tričko z bavlny.</p>
        <div class="price">399 Kč</div>
      </div>
    </a>

    <!-- PRODUKT 2 – PÁNSKÁ MIKINA -->
    <a href="produkt-mikina-panska.php" 
       class="product" 
       style="text-decoration:none; color:inherit;">

      <img src="images/mikina-panska.jpg" alt="Pánská mikina">

      <div class="product-info">
        <h3>Pánská mikina</h3>
        <p>Univerzální mikina pro volný čas i práci.</p>
        <div class="price">899 Kč</div>
      </div>
    </a>    

    <!-- PRODUKT 3 – ČEPICE -->
    <a href="produkt-cepice.php" 
       class="product" 
       style="text-decoration:none; color:inherit;">

      <img src="images/cepice.jpg" alt="Čepice">

      <div class="product-info">
        <h3>Čepice</h3>
        <p>Měkká čepice, ideální na chladné dny.</p>
        <div class="price">299 Kč</div>
      </div>
    </a>
    
  </section>

  <?php 
  // Vložení patičky stránky
  // Opět sdílená část webu
  include "footer.php";
  ?>

</body>
</html>