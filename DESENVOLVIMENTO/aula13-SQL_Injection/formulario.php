<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Teste</title>
</head>
<body>
    <h2>Formulário Teste INSEGURO</h2>
    <form action="loginInseguro.php" method="POST">
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <button type="submit">Entrar</button>
    </form>

    <br><br><hr>

    <h2>Formulário Teste SEGURO</h2>
    <form action="loginSeguro.php" method="POST">
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>