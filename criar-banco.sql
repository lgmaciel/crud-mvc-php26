.open usuarios.db
.mode column

-- Apago a tabela
DROP TABLE cidade;

-- Crio do zero

CREATE TABLE IF NOT EXISTS cidade (
	id INTEGER PRIMARY KEY ,
	nome TEXT NOT NULL
	);

PRAGMA table_info(cidade);

DROP TABLE usuario;

CREATE TABLE IF NOT EXISTS usuario (
    id INTEGER PRIMARY KEY,
    nome TEXT,
    email TEXT,
    id_cidade INTEGER,
    FOREIGN KEY (id_cidade)
        REFERENCES cidade(id) 
            ON UPDATE CASCADE
            ON DELETE CASCADE);

PRAGMA table_info(usuario);