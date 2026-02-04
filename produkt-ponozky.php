<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ponožky – Stylové Oblečení</title>
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
    <img src="images/ponozky.jpg" alt="Ponožky">

    <div class="product-info">
      <h2>Ponožky</h2>
      <div class="price">149 Kč</div>
      <p class="description">
        Pohodlné a prodyšné ponožky z kvalitní bavlny, vhodné pro každodenní nošení. 
        Díky elastickému lemu skvěle drží na noze a zajišťují komfort po celý den. 
        Ideální doplněk pro sport i volný čas.
      </p>

      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Ponožky">
    <input type="hidden" name="cena" value="149">

    <label>Velikost:</label>
    <select name="velikost" required>
        <option>36–38</option>
        <option>39–41</option>
        <option>42–44</option>
        <option>45–47</option>
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
