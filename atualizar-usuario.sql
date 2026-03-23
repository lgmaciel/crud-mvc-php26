.open usuarios.db
.mode column

UPDATE usuario

SET nome = 'Amanda',
    email = 'amanda@email.com',
    id_cidade = 3
WHERE
    id = 1