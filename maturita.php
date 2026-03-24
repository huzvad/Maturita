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

    <section class="manual-container">
  <h2>📖 Uživatelský manuál: Stylové Oblečení</h2>
  <p>Tento stručný průvodce vás provede základními funkcemi našeho e-shopu. Zjistíte, jak plynule nakupovat, spravovat svůj účet a jak obsluhovat administrátorské rozhraní.</p>

  <div class="manual-grid">
    
    <article class="manual-card">
      <h3>🛍️ Jak nakupovat (Pro zákazníky)</h3>
      <ol>
        <li><strong>Výběr zboží:</strong> V sekci <em>Obchod</em> si vyberte produkt a klikněte na něj pro zobrazení detailů.</li>
        <li><strong>Parametry:</strong> Vyberte požadovanou velikost z rozbalovacího menu.</li>
        <li><strong>Do košíku:</strong> Klikněte na <em>Přidat do košíku</em>. Zboží se okamžitě uloží do vaší relace.</li>
        <li><strong>Dokončení:</strong> Přejděte do <em>Košíku</em>.</li>
      </ol>
</article>

    <article class="manual-card">
      <h3>👤 Správa osobního účtu</h3>
      <ul>
        <li><strong>Registrace:</strong> Vytvořte si účet pro rychlejší nákupy. Vaše hesla jsou u nás ukládána pomocí pokročilého šifrování, takže jsou v naprostém bezpečí.</li>
        <li><strong>Přihlášení:</strong> Přes stránku <em>Login</em> se dostanete ke svému profilu.</li>
        <li><strong>Odhlášení:</strong> Pro ochranu svých dat se nezapomeňte po dokončení nákupu odhlásit tlačítkem <em>Odhlásit se</em>.</li>
      </ul>
    </article>

    <article class="manual-card">
      <h3>⚙️ Správa e-shopu (Pro administrátory)</h3>
      <ul>
        <li><strong>Admin Panel:</strong> Po přihlášení s rolí <span class="highlight">admin</span> se vám v menu odemkne záložka <em>Administrace</em>.</li>
        <li><strong>Přehled košíků:</strong> Zde vidíte živý přehled o všech uživatelích a rozpracovaných košících. Můžete tak analyzovat, o jaké zboží je největší zájem.</li>
        <li><strong>Obchodní data:</strong> Pro detailní finanční statistiky (např. graf průměrných cen) spusťte na svém PC náš Python skript <span class="highlight">main.py</span>.</li>
      </ul>
    </article>

  </div>
</section>



<section class="doc-container">
  <h2>🛠️ Technická dokumentace projektu</h2>
  <p>Tato dokumentace poskytuje vývojářům a hodnotitelům přehled o architektuře systému, struktuře databáze a použitých technologiích.</p>

  <div class="doc-grid">
    
    <article class="doc-card">
      <h3>💻 Architektura a Stack</h3>
      <p>Projekt je postaven jako Full-stack webová aplikace s odděleným modulem pro datovou analytiku.</p>
      <ul>
        <li><strong>Frontend:</strong> HTML5, moderní CSS3 (<span class="tech-badge">Grid</span>, <span class="tech-badge">Flexbox</span>, <span class="tech-badge">CSS Variables</span>) pro plnou responzivitu.</li>
        <li><strong>Backend:</strong> <span class="tech-badge">PHP 8+</span> pro logiku e-shopu, zpracování formulářů a správu uživatelských relací.</li>
        <li><strong>Analytika:</strong> <span class="tech-badge">Python 3</span> (moduly <code>matplotlib</code> a <code>tkinter</code>) pro vizualizaci byznys dat.</li>
      </ul>
    </article>

    <article class="doc-card">
      <h3>🗄️ Databázový model (MySQL)</h3>
      <p>Relační databáze je normalizována (BCNF) a využívá tři hlavní tabulky propojené cizími klíči:</p>
      <ul>
        <li><strong>DHusers:</strong> Správa uživatelů (obsahuje hashovaná hesla a role).</li>
        <li><strong>Zbozi:</strong> Katalog produktů (Název, Velikost, Cena).</li>
        <li><strong>DHkosik:</strong> Spojovací tabulka realizující klíčový vztah <span class="tech-badge">M:N</span> mezi uživateli a zbožím. Ke čtení dat je využíván příkaz <span class="tech-badge">JOIN</span>.</li>
      </ul>
    </article>

    <article class="doc-card">
      <h3>🔒 Bezpečnost a Logika aplikace</h3>
      <p>Kód klade důraz na moderní bezpečnostní standardy a efektivitu běhu:</p>
      <ul>
        <li><strong>Autentizace:</strong> Hesla nejsou ukládána v prostém textu, ale šifrována pomocí bezpečné funkce <span class="tech-badge">password_hash()</span>.</li>
        <li><strong>Ochrana DB:</strong> Pro komunikaci s databází jsou využívány <span class="tech-badge">Prepared Statements</span> jako ochrana proti SQL Injection.</li>
        <li><strong>Optimalizace výkonu:</strong> Nákupní košík (před dokončením objednávky) je ukládán v rychlé paměti <span class="tech-badge">$_SESSION</span>, což minimalizuje zbytečné dotazy na databázi.</li>
      </ul>
    </article>

  </div>
</section>


<section class="pitch-container">
  <h2>📈 Executive Summary (Pro investory)</h2>
  <p class="pitch-intro">Shrnutí obchodního potenciálu projektu <strong>Stylové Oblečení</strong>. Hledáme partnerství pro škálování našeho odlehčeného a datově řízeného e-shopu.</p>

  <div class="pitch-grid">
    
    <article class="pitch-card">
      <h3>🎯 Problém a Naše řešení</h3>
      <p>
        <strong>Problém:</strong> Běžné e-shopy jsou často pomalé, přeplácané a mají složitý nákupní proces, což vede k vysoké míře opuštěných košíků.<br><br>
        <strong>Řešení:</strong> Vytvořili jsme odlehčenou platformu s tzv. <span class="highlight-green">Low-friction checkoutem</span>. Díky využití Session paměti je nákup otázkou tří kliknutí, což radikálně zvyšuje konverzní poměr.
      </p>
    </article>

    <article class="pitch-card">
      <h3>📊 Datová nezávislost</h3>
      <p>
        Nejsme závislí na drahých krabicových řešeních (SaaS) ani nástrojích třetích stran. Projekt disponuje <strong>vlastním analytickým modulem v Pythonu</strong>, který čte surová data přímo z MySQL databáze. <br><br>
        To nám umožňuje generovat finanční reporty, analyzovat chování uživatelů a cílit marketing s nulovými měsíčními poplatky za software.
      </p>
    </article>

    <article class="pitch-card">
      <h3>💰 Byznys model a Retence</h3>
      <p>
        Generujeme zisk z přímého B2C prodeje módního zboží. Náš systém je připraven na zapojení retenčních nástrojů – například <span class="highlight-green">systém slevových kódů</span> motivuje zákazníky k opakovaným nákupům a vyšším útratám. Kód je navržen modulárně pro snadné přidání tisíců dalších produktů.
      </p>
    </article>

    <article class="pitch-card">
      <h3>🚀 Roadmapa (Budoucí plány)</h3>
      <p>
        S případnou investicí plánujeme:<br>
        1. Nasazení ostré platební brány (Stripe/GoPay).<br>
        2. Využití Python modulu pro nasazení <strong>AI doporučovacího systému</strong> (nabízení souvisejících produktů).<br>
        3. Napojení databáze na reálný skladový systém.
      </p>
    </article>

  </div>
</section>

<section class="onboard-container">
  <h2>🤝 Onboarding: Přehled pro nového kolegu</h2>
  <p class="onboard-intro">Vítej v týmu e-shopu <strong>Stylové Oblečení</strong>! Tento rychlý průvodce ti pomůže rozběhnout projekt na tvém počítači a seznámí tě s našimi pravidly, abychom mohli hned začít společně kódovat.</p>

  <div class="onboard-grid">
    
    <article class="onboard-card">
      <h3>🛠️ 1. Co budeš potřebovat</h3>
      <ul>
        <li>Lokální server s podporou PHP 8+ (např. <strong>XAMPP</strong>, WAMP nebo MAMP).</li>
        <li>Nainstalovaný <strong>Python 3</strong> pro spouštění analytické části.</li>
        <li>Editor kódu (doporučujeme VS Code) a funkční <strong>Git</strong> pro verzování.</li>
        <li>Python knihovny: Spusť v terminálu <span class="highlight-indigo">pip install mysql-connector-python matplotlib</span>.</li>
      </ul>
    </article>

    <article class="onboard-card">
      <h3>🚀 2. Jak projekt spustit</h3>
      <ol>
        <li>Naklonuj si náš repozitář z GitHubu do složky <code>htdocs</code> (pokud máš XAMPP).</li>
        <li>V databázi si vytvoř novou tabulku a naimportuj do ní strukturu ze souborů <span class="highlight-indigo">create.sql</span> a <span class="highlight-indigo">insert.sql</span>.</li>
        <li>Otevři skript s připojením k databázi a změň si přihlašovací údaje (jméno/heslo) podle svého lokálního nastavení.</li>
      </ol>
    </article>

    <article class="onboard-card">
      <h3>📂 3. Architektura a složky</h3>
      <ul>
        <li><strong>Kořenová složka:</strong> Najdeš zde všechny PHP soubory (např. <code>obchod.php</code>, <code>kosik.php</code>) a hlavní CSS styly.</li>
        <li><strong>Python moduly:</strong> Soubory jako <span class="highlight-indigo">main.py</span> a <span class="highlight-indigo">grafy.py</span> slouží výhradně pro desktopovou analytiku.</li>
        <li><strong>Složka /images:</strong> Zde ukládáme veškeré produktové fotografie (JPEG/PNG).</li>
      </ul>
    </article>

    <article class="onboard-card">
      <h3>📝 4. Naše Coding Standards</h3>
      <ul>
        <li><strong>Komentáře:</strong> Každá nová funkce v Pythonu musí mít správný <span class="highlight-indigo">Docstring</span> (PEP 257).</li>
        <li><strong>DRY (Don't Repeat Yourself):</strong> Společné části webu (navigace, patička) zásadně includujeme (nevkládej je natvrdo do HTML).</li>
        <li><strong>Bezpečnost:</strong> Každý nový SQL dotaz, který přijímá data od uživatele, musí být ošetřen.</li>
      </ul>
    </article>

  </div>
</section>


  </main>

  <?php 

include "footer.php";

?>

</body>
</html>

