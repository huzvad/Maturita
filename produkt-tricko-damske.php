<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dámské tričko – Stylové Oblečení</title>
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
    <img src="images/tricko-damske.jpg" alt="Dámské tričko">
    <div class="product-info">
      <h2>Dámské tričko</h2>
      <div class="price">399 Kč</div>
      <p class="description">
        Lehoučké dámské tričko z kvalitní bavlny. Příjemný a prodyšný materiál zaručí pohodlí během celého dne. 
        Hodí se jak do práce, tak i na volný čas – skvěle se kombinuje s džíny, sukní i mikinou.
      </p>

      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Dámské tričko">
    <input type="hidden" name="cena" value="399">

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
