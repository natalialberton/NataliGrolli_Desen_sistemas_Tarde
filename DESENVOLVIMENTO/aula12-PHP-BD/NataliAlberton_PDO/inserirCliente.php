<!-- DIFERENÇA GET E POST 
 GET - Exibe na URL (pouco seguro)
 POST - Mais seguro
-->
<?php

require_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro Cliente</h2>
    <form action="processarInsercao.php" method="POST">
        <label for="cli_nome">Nome: </label>
        <input type="text" name="cli_nome" id="cli_nome" required>

        <label for="cli_endereco">Endereço: </label>
        <input type="text" name="cli_endereco" id="cli_endereco" required>

        <label for="cli_telefone">Telefone: </label>
        <input type="text" name="cli_telefone" id="cli_telefone" required>

        <label for="cli_email">Email: </label>
        <input type="text" name="cli_email" id="cli_email" required>

        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>