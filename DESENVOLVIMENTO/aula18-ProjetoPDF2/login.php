<?php

require_once ('config.php');

if(isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}

$erro = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if(!empty($email) && !empty($senha)) {
        $pdo = conectarBanco();
        $sql = "SELECT id_usuario, nome, senha FROM usuario WHERE email = :email";
        $stmt = $pdo-> prepare($sql);
        $stmt-> bindParam(":email", $email);
        $stmt-> execute(); //pdo?
        $usuario = $stmt-> fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            header("Location: dashboard.php");
            exit;
        } else {
            $erro = "<script> alert('Credenciais inválidas!'); </script>";
        }
    } else {
        $erro = "<script> alert('Preencha todos os campos!'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body {
            font-family: Arial;
        }

        .container {
            width: 300px;
            margin: 100px auto;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            width: 100%;
        }

        .erro {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if($erro): ?>
            <p>Deu erro!</p>
        <?php endif; ?>

        <form method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha</label>
            <input type="senha" name="senha" id="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>