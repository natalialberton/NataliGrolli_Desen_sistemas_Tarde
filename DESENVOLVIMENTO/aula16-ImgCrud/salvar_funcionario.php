<?php

//FUNÇÃO PARA REDIMENSIONAR IMAGEM
function redimensionarImagem($imagem, $largura, $altura) {
    //OBTÉM AS DIMENSÕES ORIGINAIS DA IMAGEM
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    //CRIA UMA NOVA IMAGEM COM AS DIMENSÕES ESPECIFICADAS
    $novaImagem = imagecreatetruecolor($largura, $altura);
    
    //CRIA UMA NOVA IMAGEM A PARTIR DO ARQUIVO ORIGINAL (FORMATO JPEG)
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //COPIA E REDIMENSIONA A IMAGEM ORIGINAL PARA A NOVA IMAGEM
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    //INICIA A SAÍDA EM BUFFER PRA CAPTURAR DADOS DA IMAGEM
    ob_start(); 
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean(); //OBTÉM OS DADOS DA IMAGEM NO BANCO

    //LIBERA A MEMÓRIA USADA PELAS IMAGENS
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);
    
    return $dadosImagem; //RETORNA OS DADOS DA IMAGEM REDIMENSIONADA
}

//CONEXAO COM O BANCO DE DADOS
$host = "localhost:3307";
$dbname = "bd_imagem";
$username = "root";
$password = "root";

try {

    //CRIA UMA NOVA INSTÂNCIA DE PDO PARA CONECTAR AO BANCO DE DADOS
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE O MODO DE ERRO DO PDO PARA EXCEÇÕES

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {
        //VERIFICA SE NÃO HOUVE ERRO NO UPLOAD DA FOTO
        if ($_FILES['foto']['error'] == 0) {
            //PEGANDO DADOS DO FORMULÁRIO
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

            //REDIMENSIONA A IMAGEM PARA 300X400 PIXELS
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            //PREPARA A INSTRUÇÃO SQL PARA INSERIR OS DADOS NO BANCO
            $queryInsert = "INSERT INTO funcionarios(nome, telefone, nome_foto, tipo_foto, foto) 
                            VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
            $stmt = $pdo-> prepare($queryInsert);
            $stmt-> bindParam(':nome', $nome);
            $stmt-> bindParam(':telefone', $telefone);
            $stmt-> bindParam(':nome_foto', $nomeFoto);
            $stmt-> bindParam(':tipo_foto', $tipoFoto);
            //DEFINE O PARÂMETRO DA FOTO COMO LARGE OBJECT (LOB)
            $stmt-> bindParam(':foto', $foto, PDO::PARAM_LOB);

            if($stmt-> execute()) {
                echo "<script> alert('Funcionário cadastrado com successo!') </script>";
            } else {
                echo "<script> alert('Erro ao cadastrar funcionário!') </script>";
            }
        } else {
            echo "<script> alert(Erro ao fazer upload da foto!') </script>".$_FILES['foto']['error'];
        }
    } 
} catch(PDOException $e) {
    echo "Erro: ".$e-> getMessage();
}

$tituloPagina = 'LISTA';
include ('menu.php');

?>
<main>
    <div class="main-content">
        <h1>Lista de Imagens</h1>
        <!--LINK PARA LISTAR FUNCIONARIOS-->
        <a href="consultar_funcionario.php">Listar Funcionários</a>
    </div>
</main>
</body>
</html>