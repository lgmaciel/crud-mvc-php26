# CRUD PHP MVC

# Roteiro da aula 1

### Instalar SQLite

1. baixar sqlite 
    - Precompiled Binaries for Windows
    - Command-line tools for Windows x64
    - [https://sqlite.org/2026/sqlite-tools-win-x64-3520000.zip](https://sqlite.org/2026/sqlite-tools-win-x64-3520000.zip)
2. Descompactar arquivo .zip
3. Copiar arquivo `sqlite3.exe` para o diretório do seu projeto

### Escrever scripts de criação do **seu** banco de dados

Exemplo: [Um script sqlite3 que cria um banco](criar-banco.sql)

Para executar o script, use a linha de comando

1. Abra o terminal (cmd, bash...)
2. Digite:
    No bash
    ```sh
    $./sqlite3 criar-banco.sql
    ```
    No CMD
    ```batch
    >sqlite3 criar-banco.sql
    ```

### Escrever scripts para popular as tabelas do banco

Vamos inserir alguns registros para podermos começar o trabalho
fazendo as consultas.


Exemplo de script: [popular-banco.sql](popular-banco.sql)

### Fazer consultas usando PHP (PDO)

Referência: [https://www.sqlitetutorial.net/sqlite-php/query/](https://www.sqlitetutorial.net/sqlite-php/query/)

Exemplo trabalhado em aula: [Exemplo de Consulta usando um único arquivo](exemplo-consulta.php)