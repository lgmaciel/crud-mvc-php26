<?php
// 1. Receber pedido da View
// contendo o usuário a ser excluído do banco

$id_usuario = $_GET['id'];

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

// 3. Montar o SQL do DELETE 

$sql = "
DELETE from usuario
WHERE usuario.id = :id;
";

// pré-compilamos a instrução SQL
$statement = $pdo->prepare($sql);


// 4. Executar SQL
// substituindo com segurança
// o valor do id no corpo do SQL

$statement->execute([
    ':id' => $id_usuario
]);

// 5. Enviar resposta para o cliente/usuário (View)

require "lista-usuarios-excluir.php";
?>

