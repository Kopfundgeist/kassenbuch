<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

require('pdf/fpdf.php');
include("../config.php");

$abfrage = "SELECT * FROM betraege WHERE id = '". $_GET['id']. "'";
$ergebnis = mysql_query($abfrage); 
$row = mysql_fetch_assoc($ergebnis); 

//Variablen
$verwendungszweck = $row['verwendungszweck'];
$betrag = $row['betrag'];
$anzahl = $row['anzahl'];

$gesamt = $betrag * $anzahl;

if ($anzahl == 0)
{
	$anzahl = "1";
}

class PDF extends FPDF
{
// Page header
function Header()
{
   
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'KASSENBUCH',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->Cell(0,10,'Created with KASSENBUCH by Tayfun Guelcan ',0,0,'R');
	
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('ARIAL','B',12);

$pdf->Ln(10); 
$pdf->Cell(20,100,"", '0', 0, L);//Abstand linke seite
$pdf->Cell(15,5,"ID", '1', 0, L);
$pdf->Cell(90,5,"TITEL", '1', 0, L);
$pdf->Cell(20,5,"MENGE", '1', 0, L);
$pdf->Cell(30,5,"PREIS", '1', 0, L);

$pdf->Ln(8); 
$pdf->Cell(20,100,"", '0', 0, L);//Abstand linke seite
$pdf->Cell(15,5, $_GET['id'], '0', 0, L);
$pdf->Cell(90,5, $verwendungszweck, '0', 0, L);
$pdf->Cell(20,5, $anzahl, '0', 0, L);
$pdf->Cell(30,5,$betrag, '0', 0, L);

$pdf->Ln(0); 

$pdf->Cell(20,100,"", '0', 0, L);//Abstand linke seite
$pdf->MultiCell( 155, 18, $string , 'B', 'C', 0); 



$pdf->Cell(160,7,"Gesamtbetrag:", '0', 0, R);
$pdf->Cell(10,7,$gesamt, '0', 0, R);


		
$pdf->Output();
?>