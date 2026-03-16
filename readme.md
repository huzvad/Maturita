E-shop: Stylové Oblečení
Autor: David Hužvár

Technologie: PHP 8+, MySQL (MariaDB), Python 3.x, HTML5, CSS3

Stručný popis projektu
Projekt představuje moderní, odlehčený e-shop zaměřený na prodej módy. Systém je postaven jako Full-stack aplikace, kde webové rozhraní (PHP) slouží k prodeji a uživatelské interakci, zatímco analytická část (Python) zpracovává obchodní data přímo z databáze a vizualizuje je do grafů.

Jak projekt spustit
1. Webová část (PHP)
Vstupní soubor: about.php (Hlavní domovská stránka).

Server: Vyžaduje webový server s podporou PHP (např. Apache/Nginx) a přístup k MySQL databázi na serveru dbs.spskladno.cz.

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
