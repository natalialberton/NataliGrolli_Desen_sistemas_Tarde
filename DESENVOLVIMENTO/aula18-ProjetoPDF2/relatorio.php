<?php

use Fpdf\Fpdf;

require_once 'vendor/autoload.php';

require_once ('config.php');

//VERIFICANDO SE O USUÁRIO ESTÁ LOGADO
if(isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

class PDF extends Fpdf {
    function Header() {
        $this-> SetFont('Arial', 'B', 15);
        $this-> Cell(0, 10, 'Relatorio de Produtos - Natali Alberton', 0, 1, 'C');
        $this-> Ln(10);
    }

    function Footer() {
        $this-> SetY(-15);
        $this-> SetFont('Arial', 'I', 8);
        $this-> Cell(0, 10, 'Página' . $this-> PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdo = conectarBanco();
$pdf = new PDF();
$pdf-> AddPage();
$pdf-> SetFont('Arial', '', 12);

//CABEÇALHO TABELA
$pdf-> SetFillColor(200, 220, 255);
$pdf-> Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf-> Cell(50, 10, 'Nome', 1, 0, 'C', true);
$pdf-> Cell(80, 10, 'Descricao', 1, 0, 'C', true);
$pdf-> Cell(20, 10, 'Estoque', 1, 0, 'C', true);
$pdf-> Cell(30, 10, 'Valor Unitario', 1, 1, 'C', true);

//DADOS PRODUTOS
$stmt = $pdo-> query("SELECT * FROM produto");
$fill = false;
while($produto = $stmt-> fetch(PDO::FETCH_ASSOC)) {
    //LIMITA A QNTD DE CARACTERES
    $descricao = mb_strimwidth($produto['descricao'], 0, 40, '...');

    $pdf-> SetFillColor(240, 240, 240);
    $pdf-> Cell(10, 10, $produto['id_produto'], 1, 0, 'C', $fill);
    $pdf-> Cell(50, 10, $produto['nome_prod'], 1, 0, 'L', $fill);
    $pdf-> Cell(80, 10, $descricao, 1, 0, 'L', $fill);
    $pdf-> Cell(20, 10, $produto['qtde'], 1, 0, 'C', $fill);
    $pdf-> Cell(30, 10, number_format($produto['valor_unit'], 2, ',', '.'), 1, 1, 'C', $fill);
    $fill = !$fill; //ALTERNA A COR
}

$pdf-> Output('relatorio_produtos.pdf', "I");

?>