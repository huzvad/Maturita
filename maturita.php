<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maturita | Stylové Oblečení</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Stylové Oblečení</h1>
    <?php 

include "navbar.php";

?>
  </header>

  <main>
    <h2>Webová prezentace projektu – Stylové Oblečení</h2>

    <section>
      <h3>Stručný popis projektu</h3>
      <p>
        Webová aplikace <strong>Stylové Oblečení</strong> představuje jednoduchý e-shop zaměřený na moderní a pohodlnou módu.
        Projekt slouží jako ukázka propojení <strong>frontendové části (HTML, CSS, PHP)</strong> s <strong> Pythonem (kde se vytvářejí grafy) </strong> a <strong>My SQL databází (session) </strong>,
        která uchovává informace o produktech a zákaznících.
      </p>
      <p>
        Stránky jsou vytvořeny v <strong>PHP a HTML</strong> a stylovány pomocí <strong>CSS</strong>. Web je responzivní a správně se zobrazuje, zároveň má registraci a přihlášení uživatele, role, zobrazení produktů, přidání a odebrání z košíku, výpočet ceny košíku, admin panel.
      </p>
    </section>

    <section>
      <h3>Funkce programu</h3>
      <ul>
        <li><strong>Zobrazení nabídky produktů</strong> – hlavní stránka zobrazuje produkty (název, popis, cena, obrázek,).</li>
        <li><strong>Navigace mezi stránkami</strong> – menu obsahuje odkazy na <em>Domů</em>, <em> Přihlášení </em>, <em> Registrace </em>,  <em>Obchod</em>, <em>Kontakt</em> a <em>Maturita</em>.</li>
        <li><strong>Kontakt a informace o firmě</strong> – stránka <em>kontakt.html</em> obsahuje smyšlený e-mail, adresu a otevírací dobu.</li>
        <li><strong>Propojení s databází</strong> – PHP obsluhuje dotazy a načítá data z databáze.</li>
        <li><strong>Přihlášení a registrace</strong> - Pomocí php a databáze se dokážeme přihlašovat a odhlašovat popřípadě admin dokáže odstraňovat věci z databáze. </li>
      </ul>
    </section>

    <section>
      <h3>Ukázky použití</h3>
      <ul>
        <li>Přihlášení: ověření hesla pomocí password_verify, uložení údajů do session</li>

        <li> Košík: produkty se ukládají do $_SESSION["kosik"]</li>

        <li>Mazání z košíku: položka se odstraní pomocí unset()</li>

        <li>Admin: pouze uživatel s rolí admin může spravovat databázi </li>
      </ul>
    </section>

    <section>
      <h3>Použité technologie</h3>
      <ul>
        <li><strong>Frontend:</strong> HTML5, CSS3 (responzivní design, CSS proměnné)</li>
        <li><strong>Backend:</strong> PHP </li>
        <li><strong>Databáze:</strong> SQL – tabulky pro produkty, uživatele a objednávky, požíváme dbs.spskladno.cz </li>
        <li><strong>Propojení:</strong> Python komunikuje s databází napřímo </li> 
      </ul>
    </section>

    <section>
      <h3>Seznam použitých algoritmů a knihoven</h3>

      <h4>1. Autentizace uživatele (pseudokód)</h4>
      <pre>
      najdi uživatele v DB
pokud existuje a heslo sedí:
    přihlaš uživatele
      </pre>

      <h4>2. Kontrola oprávnění (admin)</h4>

      <pre>
      pokud uživatel není admin:
    přesměruj na login
      </pre>

      <h4>3. Výpočet ceny košíku</h4>

      <pre>
      celkem = 0
pro každou položku:
    celkem += cena * počet
      </pre>
    </section>

    <section>
      <h3>Seznam autorů:</h3>
      <p>
      David Hužvár
      </p>
      <h3>Odkaz na GitHub:</h3>
      <p>
        <a href="https://github.com/huzvad/Maturita">GitHub</a>
      </p>

    </section>

  </main>

  <?php 

include "footer.php";

?>

</body>
</html>
