<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rukavice – Stylové Oblečení</title>
   <link rel="stylesheet" href="styleprodukty.css">
</head>
<body>
  <header>
    <h1>Stylové Oblečení</h1>
    <?php 

include "navbar.php";

?>
  </header>

  <section class="product-detail">
    <img src="images/rukavice.jpg" alt="Rukavice">
    
    <div class="product-info">
      <h2>Rukavice</h2>
      <div class="price">99 Kč</div>
      <p class="description">
        Praktické a pohodlné rukavice, které ochrání tvé ruce před chladem i větrem. 
        Vyrobené z měkkého, pružného materiálu pro maximální komfort a volnost pohybu. 
        Ideální doplněk pro každodenní nošení v zimním období.
      </p>

      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Rukavice">
    <input type="hidden" name="cena" value="99">

    <label>Velikost:</label>
    <select name="velikost" required>
        <option>Dětská</option>
        <option>Univerzální</option>
    </select>

    <button type="submit">Přidat do košíku</button>
</form>

    </div>
  </section>

  <?php 

include "footer.php";

?>

</body>
</html>
