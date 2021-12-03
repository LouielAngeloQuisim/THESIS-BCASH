<?php
require ('fpdf.php');

class PDF extends FPDF {
    function Header(){
        $this->SetFont('Arial','B',11,'C');
        $this->Cell(250,7,'',0,0);
        $this->Cell(35,7,'Generated as of:',0,0,'R');
        $this->Cell(50,7,'[time&date]',1,0,'C');
        $this->Cell(0,15,'',0,1); //end of line
    }
}

$pdf= new PDF('L','mm','Legal');

//page for recycle
$pdf->AddPage();

//parang header(Recycle Report)
$pdf->SetFont('Arial','B',20,'C');
$pdf->Cell(350,6,'Recycle Report',0,1,'C');
$pdf->Cell(0,7,'',0,1); //end of line

//table header
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,10,'Name',1,0,'C');
$pdf->Cell(75,10,'Earned Points',1,0,'C');
$pdf->Cell(80,10,'Time',1,0,'C');
$pdf->Cell(80,10,'Date',1,0,'C');
$pdf->Cell(0,10,'',0,1); //end of line

//table body
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,10,'[Name]',1,0);
$pdf->Cell(75,10,'[Earned Points]',1,0);
$pdf->Cell(80,10,'[Time]',1,0);
$pdf->Cell(80,10,'[Date]',1,0);
$pdf->Cell(0,10,'',0,1); //end of line


//page for redeem
$pdf->AddPage();

//parang header(Redeem Report)
$pdf->SetFont('Arial','B',20,'C');
$pdf->Cell(350,6,'Redeem Report',0,1,'C');
$pdf->Cell(0,7,'',0,1); //end of line

//table header
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,10,'Name',1,0,'C');
$pdf->Cell(60,10,'Redeem',1,0,'C');
$pdf->Cell(55,10,'Price',1,0,'C');
$pdf->Cell(60,10,'Time',1,0,'C');
$pdf->Cell(60,10,'Date',1,0,'C');
$pdf->Cell(0,10,'',0,1); //end of line

//table body
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,10,'[Name]',1,0);
$pdf->Cell(60,10,'[Redeem]',1,0);
$pdf->Cell(55,10,'[Price]',1,0);
$pdf->Cell(60,10,'[Time]',1,0);
$pdf->Cell(60,10,'[Date]',1,0);
$pdf->Cell(0,10,'',0,1); //end of line

$pdf->Output();
?>