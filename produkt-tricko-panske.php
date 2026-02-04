<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pánské tričko – Stylové Oblečení</title>
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
    <img src="images/tricko-panske.jpg" alt="Pánské tričko">

    <div class="product-info">
      <h2>Pánské tričko</h2>
      <div class="price">449 Kč</div>
      <p class="description">
        Klasické pánské tričko s moderním střihem, které se hodí ke každému outfitu. 
        Vyrobeno z kvalitní bavlny pro maximální pohodlí a odolnost. 
        Ideální na volný čas, sport i běžné nošení.
      </p>

      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Pánské tričko">
    <input type="hidden" name="cena" value="449">

    <label>Velikost:</label>
    <select name="velikost" required>
        <option>S</option>
        <option>M</option>
        <option>L</option>
        <option>XL</option>
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
