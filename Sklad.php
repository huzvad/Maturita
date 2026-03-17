<?php
// Začátek PHP skriptu

// 1. PŘÍPRAVA PŘIHLAŠOVACÍCH ÚDAJŮ
$servername = "dbs.spskladno.cz";  // Adresa databázového serveru (školní server)
$username = "student14";           // Tvé přihlašovací jméno do databáze
$password = "spsnet";              // Tvé heslo k databázi
$dbname = "vyuka14";               // Název konkrétní databáze, se kterou chceš pracovat

// 2. VYTVOŘENÍ SPOJENÍ
// Vytvoříme nový objekt 'mysqli' (nástroj pro komunikaci s databází) a předáme mu údaje výše.
// Celé toto vytvořené spojení si uložíme do proměnné $conn (zkratka z connection).
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. KONTROLA CHYB
// Podmínka zjišťuje: Pokud se v objektu $conn objevila vlastnost 'connect_error' (nastala chyba)...
if ($conn->connect_error) {
    // Příkaz exit() okamžitě zastaví načítání celého webu a vypíše chybovou hlášku.
    // Tečka (.) slouží ke spojení tvého textu a přesného popisu chyby ze serveru.
    exit("Spojení se nezdařilo. Chyba: " . $conn->connect_error);
} 

// Pokud připojení proběhlo bez chyby, skript pokračuje sem a vypíše na obrazovku text.
echo("připojeno"); 

// 4. NASTAVENÍ KÓDOVÁNÍ
// Tento krok je kriticky důležitý pro češtinu. Říká databázi, že má s PHP komunikovat v UTF-8.
// Bez tohoto řádku by se ti místo háčků a čárek z databáze vypisovaly otazníky nebo nesmyslné znaky.
$conn->set_charset("utf8mb4");

// 5. UZAVŘENÍ SPOJENÍ
// Když je veškerá práce s databází hotová, sluší se spojení ukončit, aby nezůstalo "viset" otevřené na serveru.
// (Poznámka: Pokud bys pod tímto řádkem chtěl z databáze ještě něco číst, už to nebude fungovat).
$conn->close();

// Konec PHP skriptu
?>
