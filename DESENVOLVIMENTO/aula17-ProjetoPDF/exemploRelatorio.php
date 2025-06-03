<?php

//Inicia o buffer de saída para capturar o conteúdo
ob_start();

//Inclui o autoload do Composer (caso use dependências instaladas por ele)
require_once ('fpdf/fpdf.php');

//Cria uma nova instância da classe FPDF
//Modo P (Portrait) ou L (Landscape)
//Unidade de medida pt (pontos)
//Tipo de papel A4
$pdf = new FPDF("P", "pt", "A4");

//Adiciona uma nova página ao documento PDF
$pdf-> AddPage();

//Função auxiliar para convertes textos para ISO-8859-1 (evita problemas com acentos)
function textoPDF($txt) {
    return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $txt);
}

//Define a fonte Arial, Negrito (B), tamanho 18
$pdf-> SetFont('Arial', 'B', 18);
//Cell: 0 (largura automática), 5 (altura), textoPDF (função), 
//0 (borda), 1 (quebra de linha), C (center; alinhamento do texto)
$pdf-> Cell(0, 5, textoPDF("RELATÓRIO DE DADOS - NATALÍ ALBERTON"), 0, 1, 'C');
$pdf-> Cell(0, 5, "", "B", 1, 'C');
$pdf-> Ln(20);

$dados = [
    ['Item A', 'Descrição 1', 'Categoria A', 10.50],
    ['Item B', 'Descrição 2', 'Categoria B', 12.50],
    ['Item C', 'Descrição 3', 'Categoria C', 32.99],
    ['Item D', 'Descrição 4', 'Categoria D', 5.60],
    ['Item E', 'Descrição 5', 'Categoria E', 4.70],
    ['Item F', 'Descrição 6', 'Categoria F', 18.90],
    ['Item G', 'Descrição 7', 'Categoria G', 12.50],
    ['Item H', 'Descrição 8', 'Categoria H', 10.50],
    ['Item I', 'Descrição 9', 'Categoria I', 3.50],
    ['Item J', 'Descrição 10', 'Categoria J', 50.00],
    ['Item K', 'Descrição 11', 'Categoria K', 10.50],
];

//CABEÇALHO DA TABELA
$pdf-> SetFont('Arial', 'B', 12);
$pdf-> Cell(100, 20, textoPDF('Produto'), 1, 0, "L");
$pdf-> Cell(180, 20, textoPDF('Detalhes'), 1, 0, "L");
$pdf-> Cell(100, 20, textoPDF('Categoria'), 1, 0, "L");
$pdf-> Cell(100, 20, textoPDF('Valor'), 1, 1, "R");

//PREENCHENDO A TABELA COM DADOS
$pdf-> SetFont('Arial', '', 10);
foreach ($dados as $linha) {
    $pdf-> Cell(100, 20, textoPDF($linha[0]), 1, 0, "L");
    $pdf-> Cell(180, 20, textoPDF($linha[1]), 1, 0, "L");
    $pdf-> Cell(100, 20, textoPDF($linha[2]), 1, 0, "L");
    $pdf-> Cell(100, 20, number_format($linha[3], 2, ',', '.'), 1, 1, "R");
}

//I --> abre no navegador
//D --> realiza o download
$pdf-> Output("relatorio_produtos.pdf", "I");

?>