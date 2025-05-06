<?php

//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece a conexão
$conexao = conectaBD();

//Define a consulta SQL para buscar clientes
$sql = "SELECT pk_cli, cli_nome, cli_email FROM cliente";

//Executa a consulta no banco
$result = $conexao-> query($sql);

if($result-> num_rows > 0) {
    while($linha = $result-> fetch_assoc()) {
        echo "ID: ".$linha["pk_cli"]." - Nome: ".$linha["cli_nome"]." - Email: ".$linha["cli_email"]."<br>";
    }
}

else {
    echo "Nenhum cliente cadastrado.";
}

$conexao-> close();

?>