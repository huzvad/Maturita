<?php
session_start();

// zrušení všech session proměnných
$_SESSION = [];

// zničení session
session_destroy();
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Odhlášení</title>

<link rel="stylesheet" href="style.css">

<!-- automatické přesměrování -->
<meta http-equiv="refresh" content="2;url=about.php">
</head>

<body>

<header>
  <h1>Stylové Oblečení</h1>
</header>

<main class="hero">
  <h2>Byl(a) jsi úspěšně odhlášen(a) 👋</h2>
  <p>Za chvíli tě přesměrujeme zpět na úvodní stránku.</p>

  <p style="margin-top:20px;">
    <a href="about.php" style="color: var(--primary); font-weight:600;">
      Přejít hned
    </a>
  </p>
</main>

</body>
</html>
