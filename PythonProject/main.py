import tkinter as tk
import json
import os
from datetime import datetime
from grafy import zobraz_graf # Importujeme tvoji funkci na grafy

# Název souboru, kam budeme ukládat datum
SOUBOR_NASTAVENI = "nastaveni.json"

def nacti_posledni_datum():
    """
    KROK 1: Načte datum posledního spuštění ze souboru.
    Pokud soubor ještě neexistuje, vrátí text 'První spuštění'.
    """
    if os.path.exists(SOUBOR_NASTAVENI):
        with open(SOUBOR_NASTAVENI, "r", encoding="utf-8") as f:
            data = json.load(f)
            return data.get("posledni_spusteni", "První spuštění")
    return "První spuštění"

def uloz_aktualni_datum():
    """
    KROK 2: Zjistí aktuální datum a čas a uloží ho do souboru pro příště.
    """
    # Získáme aktuální čas a naformátujeme ho (např. 17.03.2026 14:30)
    dnesni_datum = datetime.now().strftime("%d.%m.%Y %H:%M")
    data = {"posledni_spusteni": dnesni_datum}
    
    with open(SOUBOR_NASTAVENI, "w", encoding="utf-8") as f:
        json.dump(data, f, indent=4)

def spust_aplikaci():
    """
    Hlavní funkce, která vytvoří okno a splní zadání učitele.
    """
    # Načteme datum z MINULA (předtím, než ho přepíšeme dnešním)
    minule_datum = nacti_posledni_datum()

    # Vytvoření hlavního okna
    root = tk.Tk()
    root.geometry("400x200")

    # KROK 3: Vložíme datum do titulku (nadpisu) okna přesně podle zadání!
    root.title(f"Analytika E-shopu | Naposledy spuštěno: {minule_datum}")

    # Přidáme nadpis do samotného okna
    nadpis = tk.Label(root, text="Stylové Oblečení - Analytika", font=("Arial", 16, "bold"))
    nadpis.pack(pady=15)

    # Informační text uvnitř okna
    info = tk.Label(root, text=f"Datum posledního použití:\n{minule_datum}", fg="gray")
    info.pack(pady=5)

    # Tlačítko, které zavolá funkci pro vykreslení grafu
    btn = tk.Button(root, text="Otevřít graf průměrných cen", command=zobraz_graf, 
                    bg="#1e90ff", fg="white", font=("Arial", 12))
    btn.pack(pady=20)

    # Nyní, když je okno připravené, uložíme AKTUÁLNÍ datum pro příští spuštění
    uloz_aktualni_datum()

    # Spustíme okno (program zde čeká na akci uživatele)
    root.mainloop()

# Spuštění programu
if __name__ == "__main__":
    spust_aplikaci()
