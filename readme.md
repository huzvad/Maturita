E-shop: Stylové Oblečení
Autor: David Hužvár

Technologie: PHP 8+, MySQL, Python 3.x, HTML5, CSS3

Stručný popis projektu
Projekt představuje moderní, odlehčený e-shop zaměřený na prodej módy. Systém je postaven jako Full-stack aplikace, kde webové rozhraní (PHP) slouží k prodeji a uživatelské interakci, zatímco analytická část (Python) zpracovává obchodní data přímo z databáze a vizualizuje je do grafů.

Jak projekt spustit
1. Webová část (PHP)
Vstupní soubor: about.php (Hlavní domovská stránka).
Pro graf je to main.py.

Server: Vyžaduje webový server s podporou PHP  a přístup k MySQL databázi na serveru dbs.spskladno.cz.

Konfigurace: Přihlašovací údaje k databázi jsou uloženy přímo v PHP souborech (např. v login.php nebo admin.php).

2. Analytická část (Python)
Vstupní soubor: main.py (pro výpis dat) nebo grafy.py (pro vizualizaci).

Prerekvizity: Je nutné mít nainstalovaný Python 3 a nastavený interpreter v editoru (např. VS Code).

Potřebné knihovny k instalaci
Pro správný běh Python skriptů je nutné nainstalovat následující balíčky pomocí správce pip:

Bash
pip install mysql-connector-python matplotlib
mysql-connector-python: Zajišťuje propojení Pythonu s MariaDB databází.

matplotlib: Knihovna pro generování a zobrazování grafů.

Klíčové funkce
Dynamický katalog: Produkty jsou načítány přímo z SQL tabulky Zbozi.

M:N Košík: Relace mezi uživatelem a zbožím je realizována přes spojovací tabulku DHkosik.

Autentizace: Bezpečná registrace a přihlašování pomocí password_hash().

Admin Panel: Správa uživatelů a přehled všech aktivních nákupních košíků.

Analytika: Automatický výpočet průměrných cen zboží a statistik uživatelů v Pythonu.

Ukázky použití
Nákupní proces
Uživatel se registruje v registrace.php.

V obchod.php si vybere produkt (např. "Dámské tričko").

V detailu produktu zvolí velikost a přidá zboží do košíku (uloží se do $_SESSION).

V kosik.php vidí přehled položek a celkovou cenu.

Administrace a analýza
Administrátor: Může v admin.php smazat uživatele nebo sledovat trendy v košících.

Analytik: Spustí grafy.py, čímž se vygeneruje sloupcový graf průměrných cen zboží podle kategorií.
.
.
.
.
.
.
.
vysvětlení jednotlivých souborů:
🌐 Webová část (PHP & HTML)
about.php (nebo index.php)

Funkce: Slouží jako hlavní vstupní stránka (homepage) tvého e-shopu pro zákazníky.

Co dělá: Vítá návštěvníka a představuje základní vizuál a informace o obchodu.

S čím pracuje: Využívá HTML strukturu a CSS třídy z hlavního style.css.

Na co navazuje: Pomocí příkazu include do sebe vkládá soubory navbar.php a footer.php.





obchod.php

Funkce: Funguje jako hlavní katalog produktů, kde se zobrazuje dostupná nabídka e-shopu.

Co dělá: Vypisuje uživatelům zboží (čepice, kalhoty, trička), které si mohou zakoupit.

S čím pracuje: Může dynamicky tahat data z databázové tabulky Zbozi pomocí SQL příkazu SELECT.

Na co navazuje: Zákazník se z něj proklikává na konkrétní detaily produktů (např. produkt-cepice.php).






kosik.php

Funkce: Stará se o zobrazení aktuálního stavu nákupního košíku zákazníka a výpočet celkové ceny.

Co dělá: Iteruje (prochází cyklem) uložené položky, sčítá jejich ceny a umožňuje zadat slevový kód.

S čím pracuje: Intenzivně pracuje s dočasnou pamětí serveru – globálním polem $_SESSION["kosik"].

Na co navazuje: Je to předstupeň pro případné dokončení objednávky a odkazuje se na něj v navigaci.







add_to_kosik.php

Funkce: Neviditelný "pracant" na pozadí, který zpracovává požadavek na vložení zboží do košíku.

Co dělá: Přijímá data (název, cena, velikost) z formuláře a bezpečně je ukládá pro daného uživatele.

S čím pracuje: Zachytává data odeslaná metodou POST a zapisuje je do pole $_SESSION.

Na co navazuje: Okamžitě po zpracování dat přesměruje uživatele zpět na obchod nebo do košíku.








admin.php

Funkce: Zabezpečený kontrolní panel, do kterého má přístup pouze uživatel s rolí "admin".

Co dělá: Zobrazuje přehled uživatelů a obsah jejich košíků, umožňuje případnou správu (např. smazání).

S čím pracuje: Odesílá komplexní SQL dotazy (využívá JOIN) přes propojení uložené v proměnné $conn.

Na co navazuje: Propojuje data ze tří různých SQL tabulek: DHusers, Zbozi a DHkosik.

login.php & registrace.php

Funkce: Zajišťují autentizaci, bezpečnost a přístup uživatelů do jejich účtů na webu.

Co dělá: Registrace šifruje zadaná hesla (password_hash), Login je naopak ověřuje a přihlašuje uživatele.

S čím pracuje: Komunikují s databázovou tabulkou DHusers pomocí bezpečných Prepared Statements.

Na co navazuje: Při úspěšném přihlášení vytvoří relaci v $_SESSION a odemknou uživateli funkce profilu.

navbar.php & footer.php

Funkce: Sdílené komponenty uživatelského rozhraní (hlavička s menu a patička).

Co dělá: Zajišťují, že menu a patička vypadají na všech stránkách e-shopu naprosto stejně.

S čím pracuje: S čistým HTML a PHP podmínkami (např. skryje tlačítko "Přihlásit", když už přihlášený jsi).

Na co navazuje: Vkládají se do všech hlavních souborů, čímž dodržují programátorský princip DRY (neopakuj kód).








produkt-*.php (cepice, kalhoty, tricko)

Funkce: Soubory reprezentující detail konkrétního nabízeného produktu.

Co dělá: Zobrazují fotografii, cenu, textový popis a formulář pro výběr velikosti.

S čím pracuje: Používají skrytá pole (<input type="hidden">) pro neviditelný přenos názvu a ceny.

Na co navazuje: Odesílají nasbíraná data metodou POST přímo do zpracovatelského souboru add_to_kosik.php.











🎨 Stylování (CSS)
style.css & styleprodukty.css

Funkce: Soubory kaskádových stylů, které definují vizuální podobu webu a rozložení prvků.

Co dělá: Barví tlačítka, mění fonty, zaobluje rohy a zajišťuje responzivitu pro mobilní telefony.

S čím pracuje: Využívají moderní CSS proměnné (:root), CSS Grid a Flexbox pro pokročilý layout.

Na co navazuje: Jsou připojeny do <head> sekce HTML dokumentů pomocí tagu <link rel="stylesheet">.











🐍 Python (Analytika & GUI)
main.py

Funkce: Vstupní bod desktopové části aplikace, který spouští grafické uživatelské rozhraní (GUI).

Co dělá: Vykreslí aplikační okno, načte a uloží datum posledního spuštění do paměti a nabídne tlačítko.

S čím pracuje: Využívá vestavěnou knihovnu tkinter pro okna a knihovny json a os pro práci se soubory.

Na co navazuje: Po kliknutí na tlačítko volá funkci zobraz_graf() ze souboru grafy.py.







grafy.py

Funkce: Modul výhradně zodpovědný za vizualizaci obchodních dat a statistik.

Co dělá: Přetváří surová čísla (např. průměrné ceny v kategoriích) do přehledného sloupcového grafu.

S čím pracuje: Využívá externí knihovnu matplotlib.pyplot pro generování a formátování grafiky.

Na co navazuje: Volá funkci get_avg_prices() z vedlejšího souboru db.py, aby získal data pro vykreslení.








db.py

Funkce: Zajišťuje nízkoúrovňovou komunikaci mezi Python aplikací a vzdálenou MySQL databází.

Co dělá: Připojuje se k serveru, odesílá SQL dotazy (např. SELECT AVG(Cena)) a zpracovává odpovědi.

S čím pracuje: Používá knihovnu mysql-connector-python a SQL příkazy pro agregaci dat (GROUP BY).

Na co navazuje: Funguje jako datový můstek – čerpá z tabulky Zbozi a předává data modulu grafy.py.








config.py (a nastaveni.json)

Funkce: Zajišťuje permanentní ukládání uživatelského nastavení a stavu aplikace přímo na disk počítače.

Co dělá: Obsahuje funkce pro zápis (dump) a čtení (load) dat z textového souboru ve formátu JSON.

S čím pracuje: Pracuje se slovníky (dictionaries) v Pythonu a převádí je na formát čitelný pro souborový systém.

Na co navazuje: Je využíván v main.py k tomu, aby si program pamatoval informace (např. datum) i po vypnutí.









🗄️ Databáze (SQL)
create.sql & insert.sql

Funkce: Inicializační skripty pro vytvoření a naplnění struktury databáze.

Co dělá: create.sql staví prázdné tabulky a sloupce, insert.sql do nich vkládá testovací vzorová data.

S čím pracuje: Definuje datové typy (VARCHAR, INT), primární klíče (PK) a unikátní hodnoty (UNIQUE).

Na co navazuje: Připravuje půdu pro PHP a Python – bez těchto skriptů by programy neměly kam ukládat data.







DHusers.sql & DHkosik.sql

Funkce: Přesná architektonická definice klíčových tabulek pro uživatele a nákupní košíky.

Co dělá: DHkosik tvoří spojovací tabulku, která řeší komplikovaný databázový vztah M:N (Mnoho k mnoha).

S čím pracuje: Využívá cizí klíče (FOREIGN KEY) a pravidla ON DELETE CASCADE pro udržení pořádku v datech.

Na co navazuje: Na tyto dvě tabulky přímo navazují SQL dotazy ze souborů admin.php, login.php a registrace.php.










pojmy které se mi můžou plést:
$_SESSION: "Používám superglobální pole Session, protože se data ukládají na straně serveru a nezmizí po obnovení stránky."

$_POST vs $_GET: "Data z formuláře posílám přes POST, protože je to bezpečnější a data nejsou vidět v URL adrese (jako u GET)."

JOIN: "Spojuji tabulky pomocí INNER JOIN, aby mi databáze vrátila jen ty záznamy, které mají shodu v obou tabulkách."

FOREIGN KEY: "Cizí klíč zajišťuje referenční integritu – nedovolí mi například smazat zboží, pokud ho má někdo právě v košíku (pokud nemám nastaveno CASCADE)."


"
Zobrazení chyb v PHP: (Dej to úplně nahoru do PHP souboru)

PHP
ini_set('display_errors', 1);
error_reporting(E_ALL); "
