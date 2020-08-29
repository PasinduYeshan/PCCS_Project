<?php
require_once (ROOT.'/app/lib/fpdf/fpdf.php');
/*-------------------------------------overallPDFReport-------------------------------------------*/
class ConcreteAdapter1 implements Target{
    private $fpdf;
 
    public function __construct(FPDF $fpdf) {
        $this->fpdf = $fpdf;
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage('L','A4',0);
    }

	function setHeader(){
		$this->fpdf->Image(ROOT.'/css/images/logo.png',10,6,20,0,'PNG');
        $this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->Cell(276,5,'OVERALL REPORT',0,0,'C');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Times','',12);
        $this->fpdf->Cell(276,10,'From '.$_POST['start_date'].' To '.$_POST['end_date'],0,0,'C');
        $this->fpdf->Ln(20);
	}
	function setFooter(){
	    $this->fpdf->SetY(-15);
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->Cell(0,10,'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'C');
	}

	function generatePDF($finesheets){
        $weights = array(20,20,35,30,20,20,20,20,20,20,15,20,15);
        $header = array('Sheet No','Vehicle No','Full Name','Address','Fine Date','Fine Time','Place','Offence','Licence No','ID No','Fine','Officer ID','Status');

        ob_start();
        // $pdf->Ln();
        if($finesheets != null){
            $this->fpdf->Cell(0,10,'There are '.count($finesheets).' records found');
        $this->fpdf->Ln();
        }


        for($i=0;$i<count($header);$i++){
            $this->fpdf->Cell($weights[$i],10,$header[$i],1,0,'C');
        }

        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial');
        $this->fpdf->SetFontSize(8);
        foreach($finesheets as $row){
            $this->fpdf->Cell($weights[0],10,$row->sheet_no,1,0,'C');
            $this->fpdf->Cell($weights[1],10,$row->vehicle_no,1,0,'C');
            $this->fpdf->Cell($weights[2],10,$row->full_name,1,0,'C');
            $this->fpdf->Cell($weights[3],10,$row->address,1,0,'C');
            $this->fpdf->Cell($weights[4],10,$row->fine_date,1,0,'C');
            $this->fpdf->Cell($weights[5],10,$row->fine_time,1,0,'C');
            $this->fpdf->Cell($weights[6],10,$row->place,1,0,'C');
            $this->fpdf->Cell($weights[7],10,$row->offence,1,0,'C');
            $this->fpdf->Cell($weights[8],10,$row->licence_no,1,0,'C');
            $this->fpdf->Cell($weights[9],10,$row->id_no,1,0,'C');
            $this->fpdf->Cell($weights[10],10,$row->fine,1,0,'C');
            $this->fpdf->Cell($weights[11],10,$row->officer_id,1,0,'C');
            $this->fpdf->Cell($weights[12],10,($row->status==0)?'Unpaid':'Paid',1,0,'C');
            $this->fpdf->Ln();
        }

        $this->fpdf->Output('I','report.pdf');
        ob_end_flush();

    }
}