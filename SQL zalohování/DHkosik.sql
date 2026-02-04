CREATE TABLE DHkosik (
    user_id INT NOT NULL,
    zbozi_id INT NOT NULL,
    mnozstvi INT NOT NULL DEFAULT 1,

    PRIMARY KEY (user_id, zbozi_id),

    FOREIGN KEY (user_id)
        REFERENCES DHusers(id)
        ON DELETE CASCADE,

    FOREIGN KEY (zbozi_id)
        REFERENCES Zbozi(id)
        ON DELETE CASCADE
);


/*
kdybych pak to pak chtěl číst: 
SELECT u.username, z.Typ, z.Velikost, z.Cena, k.mnozstvi
FROM DHkosik k
JOIN DHusers u ON k.user_id = u.id
JOIN Zbozi z ON k.zbozi_id = z.id; /*