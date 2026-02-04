<?php
session_start();
?> 

<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stylové Oblečení</title>
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
    <h2>Moderní móda pro každý den</h2>
    <p>Stylové a pohodlné kousky, které snadno zkombinujete s čímkoli.</p>
    <a href="obchod.php">
      <button>Prohlédnout kolekci</button>
    </a>
  </section>

  <h2 style="text-align:center; margin-top:40px;">Naše nejprodávanější kousky:</h2>

  <section class="products">
    <a href="produkt-tricko-damske.php" class="product" style="text-decoration:none; color:inherit;">
    <img src="images/tricko-damske.jpg"
         alt="Dámské tričko">
    <div class="product-info">
      <h3>Dámské tričko</h3>
      <p>Lehké a příjemné tričko z bavlny.</p>
      <div class="price">399 Kč</div>
    </div>
  </div>

    <a href="produkt-mikina-panska.php" class="product" style="text-decoration:none; color:inherit;">
      <img src="images/mikina-panska.jpg"
           alt="Pánská mikina">
      <div class="product-info">
        <h3>Pánská mikina</h3>
        <p>Univerzální mikina pro volný čas i práci.</p>
        <div class="price">899 Kč</div>
      </div>
    </a>    

    <a href="produkt-cepice.php" class="product" style="text-decoration:none; color:inherit;">
      <img src="images/cepice.jpg"
           alt="Čepice">
      <div class="product-info">
        <h3>Čepice</h3>
        <p>Měkká čepice, ideální na chladné dny.</p>
        <div class="price">299 Kč</div>
      </div>
    </a>
    
  </section>

  <?php 

include "footer.php";

?>

</body>
</html>
