<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sportovní kalhoty – Stylové Oblečení</title>
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
    <img src="images/kalhoty-sportovni.jpg" alt="Sportovní kalhoty">

    <div class="product-info">
      <h2>Sportovní kalhoty</h2>
      <div class="price">799 Kč</div>
      <p class="description">
        Lehká a pohodlná sportovní kalhoty, ideální pro běh, fitness i volnočasové aktivity. 
        Díky prodyšnému materiálu zůstaneš v pohodlí i při náročném tréninku. 
        Moderní střih zaručuje volnost pohybu a stylový vzhled.
      </p>

      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Sportovní kalhoty">
    <input type="hidden" name="cena" value="799">

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
