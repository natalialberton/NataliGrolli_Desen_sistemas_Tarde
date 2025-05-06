<?php

//Definição das credenciias de acesso ao banco de dados
$nomeServidor = "localhost:3307";  //Endereço do servidor MySQL
$usuario = "root";                 //Nome do usuário do banco
$senha = "root";                   //Senha do banco
$bancoDeDados = "empresa";         //Nome do banco de dados

//Criação da conexão com MySQLi
$conn = mysqli_connect($nomeServidor, $usuario, $senha, $bancoDeDados);

//Verificação da conexão
if (!$conn) { //Caso a conexão falhe, interrompe o script e exibe uma mensagem de erro
    die("Conexão falhou: ".mysqli_connect_error());
}

//Configuração do conjunto de caracteres para evitar problemas de acentuação
mysqli_set_charset($conn, "utf8mb4");

//Mensagem indicando que a conecção foi estabelecida corretamente
echo "Conexão bem-sucedida!!<br><br>";

//Consulta SQL para obter clientes
$sql = "SELECT pk_cli, cli_nome, cli_email FROM cliente";
$result = mysqli_query($conn, $sql);

//Verifica se há resultados na consulta
if (mysqli_num_rows($result) > 0) {
    //Itera sobre os resultados e exibe os dados
    while ($linha=mysqli_fetch_assoc($result)) {
        echo "ID: ".$linha["pk_cli"]." - Nome: ".$linha["cli_nome"]." - Email: ".$linha["cli_email"]."<br>";
    }
}   

else {
    echo "Nenhum resultado encontrado.";
}

//Fecha a conexão com o banco de dados
mysqli_close($conn);

?>
