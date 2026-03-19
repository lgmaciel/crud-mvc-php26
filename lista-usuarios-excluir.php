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
JOIN cidade ON cidade.id = usuario.id_cidade;
";

// Fazemos a consulta usando 'query()'
$rows = $pdo->query($sql);
//$rows contém as linhas da resposta (linhas do Result Set)


 // Chamamos a VIEW (html) que irá exibir esses dados
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table>
        <!--Cabeçalho da tabela-->
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Comando</th>
        </thead>
        
        <!--Início do Corpo da tabela (linhas)-->
        <tbody>

        <!--
        Aqui vem a parte Dinâmica da página
        Cada linha da tabela contém dados variáveis
        Esses dados são obtidos do Result Set ($rows)
        
        -->
        <?php
        // Lemos linha por linha o Result Set
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            //$row é uma linha do Result Set
            $id_usuario = $row['id'];
            $nome =  $row['nome'];
            $email = $row['email'];
            $cidade = $row['cidade'];

            // Este é o 'template' da linha
            // Ele contém o HTML da linha da tabela
            // e nele interpolamos os valores
            // que pegamos da linha do Result Set
            // (os dados que vieram do banco)
            $linha = "
                <tr>
                <td>$nome</td>    
                <td>$email</td>    
                <td>$cidade</td>
                <td>
                <a href='excluir-usuario.php?id=$id_usuario'>X</a>
                </td>    
                </tr>
            ";
            
            // Escrevo uma linha da tabela
            echo $linha;            
        }
        ?>
        <!--Fim do corpo da tabela (final das linhas)-->

        </tbody>
    </table>
</body>
</html>

