import matplotlib.pyplot as plt
from db import get_avg_prices # Importujeme funkci pro průměrné ceny

def zobraz_graf():
    """
    Tato funkce načte data z databáze a vykreslí graf.
    Vložením kódu do funkce splníme požadavek na modularitu.
    """
    # 1. Načtení dat z DB (voláme funkci z db.py)
    data = get_avg_prices()

    # Příprava dat pro osy X a Y
    # TRIM() v SQL nám zajistí čisté názvy bez mezer
    typy = [row[0] for row in data]
    ceny = [float(row[1]) for row in data]

    # 2. Nastavení a vykreslení grafu
    plt.figure(figsize=(10, 6))
    plt.style.use('ggplot') # Použití moderního stylu
    
    bars = plt.bar(typy, ceny, color='#1e90ff')

    # Přidání popisků přímo nad sloupce (vylepšení pro investora)
    plt.bar_label(bars, fmt='%.0f Kč', padding=3)

    plt.title("Průměrná hodnota zboží podle kategorie")
    plt.xlabel("Kategorie")
    plt.ylabel("Průměrná cena (Kč)")

    plt.xticks(rotation=30, ha='right')
    plt.tight_layout()
    
    # 3. Zobrazení okna s grafem
    plt.show()

# Tato podmínka zajistí, že se graf zobrazí, i když soubor spustíš přímo
if __name__ == "__main__":
    zobraz_graf()
