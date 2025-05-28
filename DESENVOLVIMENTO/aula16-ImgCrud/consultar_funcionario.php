<?php

//CONEXAO COM O BANCO DE DADOS
$host = "localhost:3307";
$dbname = "bd_imagem";
$username = "root";
$password = "root";

try {

    //CRIA UMA NOVA INSTÂNCIA DE PDO PARA CONECTAR AO BANCO DE DADOS
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE O MODO DE ERRO DO PDO PARA EXCEÇÕES

    //RECUPERA TODOS OS FUNCIONÁRIOS DO BANCO DE DADOS
    $querySelect = "SELECT id, nome FROM funcionarios";
    $stmt = $pdo-> prepare($querySelect); //PREPARA O SQL PARA A EXECUÇÃO
    $stmt-> execute(); //EXECUTA A INSTRUÇÃO
    $funcionarios = $stmt-> fetchAll(PDO::FETCH_ASSOC); //BUSCA TODOS OS RESULTADOS COM UMA MATRIZ ASSOCIATIVA

    //VERIFICA SE FOI SOLICITADO A EXCLUSÃO DE UM FORMULÁRIO
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo-> prepare($sql_excluir);
        $stmt_excluir-> bindParam(":id", $excluir_id, PDO::PARAM_INT);
        $stmt_excluir-> execute();

        //REDIRECIONA PARA EVITAR O REENVIO DO FORMULÁRIO
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

} catch(PDOException $e) {
    echo "Erro: ".$e-> getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA FUNCIONARIO</title>
</head>
<body>
    <h1>Consulta de Funcionário</h1>
    <ul>
        <?php foreach($funcionarios as $funcionario) : ?>
        <li>
            <a href="visualizar_funcionario.php?id<? $funcionario['id'] ?>">
                <?=htmlspecialchars($funcionario['nome'])?>
            </a>

            <form method="POST" style="display: inline;">
                <input type="hidden" name="excluir_id" value="<?php $funcionario['id'] ?>">
                <button type="submit">Excluir</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>