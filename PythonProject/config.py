import json

def save_settings():
    """
    Uloží výchozí nastavení uživatelského rozhraní do souboru settings.json.
    Slouží pro demonstraci uložení stavu aplikace na disk.
    """
    settings = {
        "theme": "dark",
        "last_user": "admin",
        "language": "cs"
    }

    with open("settings.json", "w", encoding="utf-8") as f:
        json.dump(settings, f, indent=4, ensure_ascii=False)


def load_settings():
    """
    Načte uživatelské nastavení ze souboru settings.json.
    
    Vrací:
        dict: Slovník (dictionary) obsahující uložené nastavení.
    """
    with open("settings.json", "r", encoding="utf-8") as f:
        return json.load(f)
