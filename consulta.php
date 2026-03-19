<?php
// Conectar com o banco

//String de conexão
$dsn = "sqlite:usuarios.db"; 

try {
    //Criamos o pdo/conexão
    $pdo = new PDO($dsn);
    //echo 'Conexão com banco ok.';
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Montar SQL da consulta

// Instrução SQL que será executada
$sql = "
SELECT usuario.id, usuario.nome, email, cidade.nome AS 'cidade'
FROM usuario
JOIN cidade ON cidade.id = usuario.id_cidade;
";


// Receber o Result Set da resposta

// Fazemos a consulta usando 'query()'
$rows = $pdo->query($sql);
//$rows contém as linhas da resposta (linhas do Result Set)


// Ler dados (linhas) do Result Set
$dados_usuario = $rows->fetch(PDO::FETCH_ASSOC);

// Passar valores para a [camada] View mostrar
$nome =  $dados_usuario['nome'];
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    </head>

    <body>
    <p>
        Bem vindo <?php echo $nome;?>
    </p>
    <body>
</html>
