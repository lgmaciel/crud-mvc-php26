<?php
// Conectar com o banco de dados

//String de conexão
$dsn = "sqlite:usuarios.db"; 

try {
    //Criamos o pdo/conexão
    $pdo = new PDO($dsn);
    //echo 'Conexão com banco ok.';
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Instrução SQL que será executada
$sql = "
SELECT usuario.id, usuario.nome, email, cidade.nome AS 'cidade'
FROM usuario
JOIN cidade ON cidade.id = usuario.id_cidade
WHERE usuario.id = " . $_GET['id'] . "; ";


// Fazemos a consulta usando 'query()'
$rows = $pdo->query($sql);

// Lemos 1 linha do result set
$row = $rows->fetch(PDO::FETCH_ASSOC);
$id_usuario = $row['id'];
$nome =  $row['nome'];
$email = $row['email'];
$cidade = $row['cidade'];

// Lemos dados das cidades (para preencher a combo box Cidade do form )
 
$sql_cidades = "
SELECT id, nome
FROM cidade
";

// Fazemos a consulta usando 'query()'
$rows_cidades = $pdo->query($sql_cidades);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar usuário</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <h1>Atualizar usuário</h1>
    <form action="ctrl-atualizar-usuario.php" method="post">
        <input type = "hidden" name="usuario_id" value="<?=$id_usuario?>">
        <label>Nome</label>
        <input name="usuario_nome" value="<?=$nome?>">
        
        <label>Email</label>
        
        <input name="usuario_email" value="<?=$email?>">
        
        <label>Cidade</label> 

        
        <select name="usuario_id_cidade">
            <?php
            while($row_cidade = $rows_cidades->fetch(PDO::FETCH_ASSOC)) {
                $cidade_id = $row_cidade['id'];
                $cidade_nome = $row_cidade['nome'];
                echo "<option value='$cidade_id'>$cidade_nome</option>" .PHP_EOL;
            }            
            ?>
        </select>
        
        
        <input type ="submit" value="Atualizar">
    </form>
</body>
</html>

