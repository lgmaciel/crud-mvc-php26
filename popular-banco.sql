.open usuarios.db
.mode column

-- Inserts nas tabelas 'satélite'

INSERT INTO cidade (nome) VALUES ('Porto Alegre');
INSERT INTO cidade (nome) VALUES ('Cachoeirinha');
INSERT INTO cidade (nome) VALUES ('Viamão');
INSERT INTO cidade (nome) VALUES ('Sapucaia');
INSERT INTO cidade (nome) VALUES ('Veranópolis');
INSERT INTO cidade (nome) VALUES ('Antônio Prado');
INSERT INTO cidade (nome) VALUES ('Anta Gorda');
INSERT INTO cidade (nome) VALUES ('Santo Antônio da Patrula');

-- Testar

SELECT id, nome
FROM cidade;


INSERT INTO usuario (nome, email, id_cidade)
VALUES ('Amanda', 'manda@email.com',3);

INSERT INTO usuario (nome, email, id_cidade)
VALUES ('Bianca', 'bibi@email.com',2);

INSERT INTO usuario (nome, email, id_cidade)
VALUES ('Carla', 'caca@email.com',1);

INSERT INTO usuario (nome, email, id_cidade)
VALUES ('Daniela', 'dani@email.com',1);

INSERT INTO usuario (nome, email, id_cidade)
VALUES ('Erica', 'kika@email.com',4);

-- Testar

SELECT usuario.id, usuario.nome, email, cidade.nome AS 'cidade'
FROM usuario
JOIN cidade ON cidade.id = usuario.id_cidade;