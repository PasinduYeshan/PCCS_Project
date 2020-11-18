<?php
require_once (ROOT.'/app/lib/fpdf/fpdf.php');


class PDFAdapter extends FPDF
{
    function Header(){
        $this->Image(ROOT.'/css/images/logo.png',10,6,20,0,'PNG');
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'OVERALL REPORT',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'From '.$_POST['start_date'].' To '.$_POST['end_date'],0,0,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}