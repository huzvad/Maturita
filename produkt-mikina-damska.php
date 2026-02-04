<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dámská mikina – Stylové Oblečení</title>
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
    <img src="images/mikina-damska.jpg" alt="Dámská mikina">

    <div class="product-info">
      <h2>Dámská mikina</h2>
      <div class="price">899 Kč</div>
      <p class="description">
        Pohodlná dámská mikina z měkkého bavlněného materiálu. Ideální pro každodenní nošení, 
        sport i volný čas. Moderní střih a příjemný materiál zaručí komfort i styl.
      </p>

     
      <form method="post" action="add_to_kosik.php">
    <input type="hidden" name="nazev" value="Dámská mikina">
    <input type="hidden" name="cena" value="899">

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
