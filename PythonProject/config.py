import json

def save_settings():
    settings = {
        "theme": "dark",
        "last_user": "admin",
        "language": "cs"
    }

    with open("settings.json", "w", encoding="utf-8") as f:
        json.dump(settings, f, indent=4, ensure_ascii=False)


def load_settings():
    with open("settings.json", "r", encoding="utf-8") as f:
        return json.load(f)
