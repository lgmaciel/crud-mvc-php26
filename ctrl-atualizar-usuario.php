<?php
# Receber dados da VIEW
$usuario_id = $_POST['usuario_id'];
$usuario_nome = $_POST['usuario_nome'];
$usuario_email = $_POST['usuario_email'];
$usuario_id_cidade = $_POST['usuario_id_cidade'];

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

# Montar SQL do UPDATE

$sql = "
UPDATE usuario
SET nome = :nome,
    email = :email,
    id_cidade = :id_cidade
WHERE
    id = :id_usuario
";

// pré-compilamos a instrução SQL
$statement = $pdo->prepare($sql);


// 4. Executar SQL
// substituindo com segurança
// o valor do id no corpo do SQL

$statement->execute([
    ':nome' => $usuario_nome,
    ':email' => $usuario_email,
    ':id_cidade' => $usuario_id_cidade,
    ':id_usuario' => $usuario_id
]);

include "lista-usuarios-editar.php";
?>

