<?php
require_once (ROOT.'/app/lib/fpdf/fpdf.php');
/*-------------------------------------branchPDFReport-------------------------------------------*/
class ConcreteAdapter3 implements Target{
    private $fpdf;
 
    public function __construct(FPDF $fpdf) {
        $this->fpdf = $fpdf;
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage('L','A3',0);
    }

	function setHeader($heading){
		$this->fpdf->Image(ROOT.'/css/images/logo.png',10,6,20,0,'PNG');
        $this->fpdf->SetFont('Arial','B',14);
        $this->fpdf->Cell(276,30,$heading,0,0,0);//'C'
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial','B',12);
        $this->fpdf->Cell(276,10,'From '.$_POST['start_date'].' To '.$_POST['end_date'],0,0,1);
        $this->fpdf->Ln();
	}
	function setFooter(){
	    $this->fpdf->SetY(-15);
        $this->fpdf->SetFont('Arial','',8);
        $this->fpdf->Cell(0,10,'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'C');
	}

	function generatePDF($offenceWithCounts){
        $header1 = array('','C4208- Monthly Report','SLTB','Private','Lorry','Container','Car','Dual','Motorcycle','Three-Wheeler','Light bus','Light Lorry','Land vehicles','Bicycle','Pedestrian','TOTAL');
        $header2 = array('Tractor','Hand tractor');
        $weights = array(10,120,18,18,18,18,18,18,18,18,18,18,18,18,18,18,15);
        $gapL=array_sum(array_slice($weights,14));
        $gapR=array_sum($weights)-$gapL-$weights[12]-$weights[13];
        $vehicleNames=array('SLTB','Private','Lorry','Container','Car','Dual','Motorcycle','Three-Wheeler','Light bus','Light Lorry','Tractor','Hand tractor','Bicycle','Pedestrian');
        $this->fpdf->SetFont('Arial','B',8);


    //testing-------
        for($i=0;$i<count($header1);$i++){
            if($i<12){
                $this->fpdf->Cell($weights[$i],15,$header1[$i],1,0,'C');
		    }
            else if($i>12){
                $this->fpdf->Cell($weights[$i+1],15,$header1[$i],1,0,'C');
		    }
            else{
                $sweight=$weights[$i];
                $this->fpdf->Cell($weights[$i]*2,7,$header1[$i],1,0,'C');
		    }
        }
        $this->fpdf->Cell(0,7,"",0,1);

        $this->fpdf->Cell($gapR,8,"",0,0,'C');
        for($i=0;$i<count($header2);$i++){
           $this->fpdf->Cell($sweight,8,$header2[$i],1,0,'C');
        }
        $this->fpdf->Cell($gapL,8,"",0,0,'C');
    //---------------
        $this->fpdf->Ln();
        
        

        $this->fpdf->SetFontSize(7);
        for($j=0;$j<66;$j+=2){
            $total=0;
            $this->fpdf->SetFont('Arial','B',9);
            $this->fpdf->Cell($weights[0],10,$j/2+1,1,0,'C');//number column
            $this->fpdf->Cell($weights[1],10,$offenceWithCounts[$j],1,0,'L');//offence name column
            $this->fpdf->SetFont('Arial');
            for($i=0;$i<14;$i++){
                $this->fpdf->Cell($weights[$i+2],10,$offenceWithCounts[$j+1][$vehicleNames[$i]],1,0,'C');//original->$weights[$i+1]
                $total+=$offenceWithCounts[$j+1][$vehicleNames[$i]];//calculting Total
            }
            $this->fpdf->Cell($weights[16],10,$total,1,0,'C');//original->$weights[$i+1]
            $this->fpdf->Ln();
		}
        $this->fpdf->Output();

    
    }
}