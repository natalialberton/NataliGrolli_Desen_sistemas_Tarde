<?php
session_start();
require_once 'conexao.php';

//VERIFICA SE O USUÁRIO TEM PERMISSÃO; SE É ADMIN (1)
if ($_SESSION['perfil'] != 1) {
    header("Location: principal.php");
    echo "<script>alert('Acesso negado!');</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_fornecedor = $_POST['nome_fornecedor'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $id_funcionario_registro = $_POST['id_funcionario_registro'];

    $sql = "INSERT INTO fornecedor(nome_fornecedor, endereco, telefone, email, contato, id_funcionario_registro) 
    VALUES(:nome_fornecedor, :endereco, :telefone, :email, :contato, :id_funcionario_registro)";
    $stmt = $pdo-> prepare($sql);
    $stmt-> bindParam(':nome_fornecedor', $nome_fornecedor);
    $stmt-> bindParam(':endereco', $endereco);
    $stmt-> bindParam(':telefone', $telefone);
    $stmt-> bindParam(':email', $email);
    $stmt-> bindParam(':contato', $contato);
    $stmt-> bindParam(':id_funcionario_registro', $id_funcionario_registro);

    if ($stmt-> execute()) {
        echo "<script>alert('Fornecedor cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar fornecedor!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE FORNECEDOR</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <h2>Cadastrar Fornecedor</h2>

    <form action="cadastrar_fornecedor.php" method="POST">
        <label for="nome">Nome: </label>
        <input type="text" name="nome_fornecedor" id="nome_fornecedor" placeholder="Digite seu nome" required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" required>

        <label for="contato">Contato: </label>
        <input type="password" name="contato" id="contato" placeholder="Digite seu contato" required>

        <label for="id_perfil">Perfil: </label>
        <select name="id_perfil" id="id_perfil">
            <option value="1">Administrador</option>
            <option value="2">Secretária</option>
            <option value="3">Almoxarife</option>
            <option value="4">Cliente</option>
        </select>

        <button type="submit">Salvar</button>
        <button type="reset">Cancelar</button>
    </form>

    <a href="principal.php">Voltar</a>
</body>
</html>