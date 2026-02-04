<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pánská mikina – Stylové Oblečení</title>
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
    <img src="images/mikina-panska.jpg" alt="Pánská mikina">

    <div class="product-info">
      <h2>Pánská mikina</h2>
      <div class="price">999 Kč</div>
      <p class="description">
        Stylová pánská mikina s pohodlným střihem, která se hodí do města i na sport. 
        Vyrobena z kvalitní bavlny s příměsí polyesteru pro delší životnost. 
        Ideální volba pro chladné dny.
      </p>

      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Pánská mikina">
    <input type="hidden" name="cena" value="999">

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
