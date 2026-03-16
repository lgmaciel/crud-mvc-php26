<?php
$usuario_nome = $_POST["usuario_nome"];
$usuario_email = $_POST["usuario_email"];
$usuario_id_cidade = $_POST["usuario_id_cidade"];

/**
 * Passar dados para a model registar no banco de dados
 * ...
 */

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
// OBSERVE: usamos "marcadores de posição"
// para indicar onde os valores recebidos
// do formulário serão inseridos
//
$sql = "
INSERT INTO usuario (nome, email, id_cidade)
VALUES (:nome, :email, :id_cidade);
";

// pré-compilamos a instrução SQL
 $statement = $pdo->prepare($sql);
 
 $statement->execute([
     ':nome' => $usuario_nome,
     ':email' => $usuario_email,
     ':id_cidade' => $usuario_id_cidade
 ]);
 

    
    $msg_status_cadastrar_usuario = "";

 // Conferir se um novo registro foi mesmo inserido.
 // Existe um novo id gerado para o usuário?
 
    $usuario_id = $pdo->lastInsertId();
    if(isset( $usuario_id )) {        
        $msg_status_cadastrar_usuario = "Sucesso!";
    } else {
        $msg_status_cadastrar_usuario = "Erro no cadastro.";
    }

 // Pedir para a View mostrar o resutaldo
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do cadastro</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>

    <h1>Resultado do Cadastro</h1>
    <p><?=$msg_status_cadastrar_usuario?></p>

    <p><?=$usuario_nome?> cadastrado</p>


    <a href="form-cadastrar-usuario.html">Voltar para cadastro de usuário</a>
</body>
</html>