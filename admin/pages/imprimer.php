<?php
require './lib/php/dbConnect.php';
require_once './lib/php/classes/Connexion.class.php';
require './lib/php/classes/Vue_ordinateurDB.class.php';

$cnx =  Connexion::getInstance($dsn, $user, $pass);
//recup de donees
$obj = new Vue_ordinateurDB($cnx);
$liste = $obj->getVue_ordinateur();
$nbrG = count($liste);
require './lib/fpdf181/fpdf.php';
ob_get_clean();
$pdf = new FPDF('P','cm','A4');
$pdf-> setFONT('Arial','B',14);
$pdf->AddPage();
$pdf->setX(3);

$pdf->Cell(35, 1, utf8_decode('Tout nos ordinateurs'),0,0,'L');
//sous-titre

$pdf->SetFillColor(200,10,10);
$pdf->SetDrawColor(0,0,255);
$pdf->SetTextColor(0,0,0);
$pdf->setXY(3,2);



//pour les titres
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0);

$x =3;
$y =3;
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','B',12);
$pdf->cell(8,.7, utf8_decode('dénomination'),0,0,'L');
$pdf->SetXY($x + 8,$y);
$pdf->cell(2,.7, 'Prix',0,0,'L');
$pdf->cell(5,1, 'Image',0,0,'C');

$pdf->SetFont('Arial','',12);
$y++;

for ($i=0;$i<$nbrG;$i++){
    
    $pdf->SetXY($x, $y);//$x et $y valent 3 et 4 resp.
    $pdf->cell(5,1,$liste[$i]['designation'],0,0,'C');
    $pdf->SetXY($x +8, $y);
    $pdf->cell(5,1,$liste[$i]['prix_unitaire'],0,0,'C');
    $pdf->Image('./images/'.$liste[$i]['image'],$x+12,$y,1.5,'JPG');
    $y+=2;
    
     if (($i + 1) % 10 == 0) {
        $pdf->AddPage();
        $x = 3;
        $y = 3;
        $pdf->SetXY($x, $y);
        $pdf->SetFont('Arial', 'B', 12);
        $den = utf8_decode('Dénomination');
        $pdf->cell(8, 1, $den, 0, 'C', 1, 1);
        $pdf->SetXY($x + 8, $y);
        $pdf->cell(2, 1, 'Prix', 0, 'C', 1, 1);
        $pdf->SetXY($x+10,$y);
        $pdf->cell(5, 1, 'Image', 0, 'C', 1, 1);
        $pdf->SetFont('Arial', '', 12);
        $y++;
        $pdf->SetFont('Arial', '', 12);        
    }
}


$pdf->Output();