<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAMENTO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <h2>Funcionário</h2>
        <!--FORMULÁRIO PARA CADASTRAR FUNCIONÁRIO-->
        <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
           
            <!--CAMPO PARA INSERIR O NOME DO FUNCIONÁRIO-->
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required><br>

            <!--CAMPO PARA INSERIR O TELEFONE DO FUNCIONÁRIO-->
            <label for="telefone">Telefone: </label>
            <input type="tel" name="telefone" id="telefone" required><br>

            <!--CAMPO PARA FAZER UPLOAD DA FOTO DO FUNCIONÁRIO-->
            <label for="foto">Foto: </label>
            <input type="file" name="foto" id="foto" required><br>

            <!--BOTÃO PARA ENVIAR O FORMULÁRIO-->
             <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>