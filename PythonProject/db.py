import mysql.connector

def connect_to_db():
    """Pomocná funkce pro připojení k databázi"""
    return mysql.connector.connect(
        host="dbs.spskladno.cz",
        user="student14",
        password="spsnet",
        database="vyuka14"
    )

def get_avg_prices():
    conn = connect_to_db()
    cursor = conn.cursor()
    
    # Seskupíme podle typu a spočítáme průměrnou cenu
    # TRIM odstraní přebytečné mezery z názvů v databázi
    cursor.execute("SELECT TRIM(Typ), AVG(Cena) FROM Zbozi GROUP BY Typ")
    
    data = cursor.fetchall()
    conn.close()
    return data

# Původní funkce můžeš nechat nebo smazat