<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Čepice – Stylové Oblečení</title>
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
    <img src="images/cepice.jpg" alt="Čepice">

    <div class="product-info">
      <h2>Čepice</h2>
      <div class="price">299 Kč</div>
      <p class="description">
        Stylová zimní čepice, která tě udrží v teple a zároveň doplní tvůj outfit. 
        Měkký a pružný materiál se pohodlně přizpůsobí tvaru hlavy. 
        Ideální pro chladné dny ve městě i na horách.
      </p>
   <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Čepice">
    <input type="hidden" name="cena" value="299">

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
