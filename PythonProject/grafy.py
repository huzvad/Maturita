import matplotlib.pyplot as plt
from db import get_avg_prices
"""
    Připojí se k databázi MySQL a vypočítá průměrnou cenu 
    pro jednotlivé kategorie zboží pomocí SQL funkce AVG().
    Vrací seznam n-tic (typ, průměrná_cena).
 """ 

# Nastavení stylu (podobný tomu, co jsi poslal, ale čistší pro sloupce)
plt.style.use('ggplot')

# Načtení reálných dat z databáze
data = get_avg_prices()

# Rozdělení dat pro graf
typy = [row[0] for row in data]
prumerne_ceny = [float(row[1]) for row in data]

# Vytvoření grafu
fig, ax = plt.subplots(figsize=(10, 6))

# Vykreslení sloupců s barvou "SkyBlue"
bars = ax.bar(typy, prumerne_ceny, color='#1e90ff', edgecolor='#0b53a7')

# Přidání popisků s cenou přímo nad sloupce
ax.bar_label(bars, fmt='%.0f Kč', padding=3, fontsize=10, fontweight='bold')

# Nastavení popisků a titulků
ax.set_title("Průměrná hodnota zboží podle kategorie", fontsize=15, pad=20, fontweight='bold')
ax.set_ylabel("Průměrná cena (Kč)", fontsize=12)
ax.set_xlabel("Kategorie produktu", fontsize=12)

# Otočení popisků na ose X, aby se text nepřekrýval
plt.xticks(rotation=30, ha='right')

# Automatické upravení okrajů
plt.tight_layout()

# Zobrazení grafu
plt.show()