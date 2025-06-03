<?php

ob_start();
require_once ('fpdf/fpdf.php');

$pdf = new FPDF("P", "pt", "A4");
$pdf-> AddPage();

class NOVOPDF extends FPDF {
    function Header() {
        $this-> Image('img/logo.png', 5, 1, 50);
        //Pula 30 pontos | Ln --> line break; move o cursor verticalmente
        $this-> Ln(30);
        $this-> SetFont('Arial', 'B', 15);
        //Deixando um espaço à esquerda
        $this-> Cell(80); 
        $this-> Cell(90, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Desenvolvido por Natalí Alberton'), 1, 0, 'C');
        $this-> Ln(20);
    }

    function Footer() {
        //Posição vertical a 15 pontos do fim da página
        $this-> SetY(-15);
        $this-> SetFont('Arial', 'I', 8);
        $this-> Cell(0, 10,  iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Página'). ''. $this-> PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new NOVOPDF();
//Ativa o uso do {nb} para total de páginas no rodapé
$pdf-> AliasNbPages();
$pdf-> AddPage();
$pdf-> SetFont('Times', '', 12);

//Gera 80 linhas com conteúdo simulado
for ($i=1; $i <= 80; $i++) {
    $pdf-> Cell(0, 10, 'Teste de linhas'.$i, 0, 1);
}

$pdf-> Output("loguinho", "I");

?>