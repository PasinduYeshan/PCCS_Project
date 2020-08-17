<?php
require_once (ROOT.'/app/lib/fpdf/fpdf.php');


class BranchPDFtest extends FPDF
{
    function generatePDF($offenceWithCounts,$branchName){
        $header1 = array('','C4208- Monthly Report','SLTB','Private','Lorry','Container','Car','double','bicycle','3wheel','_bus','_lorry','Land vehicles','bicycle2','passenger','TOTAL');
        $header2 = array('trackter','hand trac');
        $weights = array(10,120,18,18,18,18,18,18,18,18,18,18,18,18,18,18,15);
        $gapL=array_sum(array_slice($weights,14));
        $gapR=array_sum($weights)-$gapL-$weights[12]-$weights[13];

        $fpdf = new FPDF('P','mm','A4');
        $fpdf->AddPage('L','A3',0);
        

        $fpdf->Image(ROOT.'/css/images/logo.png',10,6,20,0,'PNG');
        $fpdf->SetFont('Arial','B',14);
        $fpdf->Cell(276,30,'BRANCH REPORT-'.$branchName,0,0,0);//'C'
        $fpdf->Ln();
        $fpdf->SetFont('Arial','B',12);
        $fpdf->Cell(276,10,'From '.'2020-01-01'.' To '.'2020-05-05',0,0,1);//hardcoded for testing
        $fpdf->Ln();

        $fpdf->SetFont('Arial','B',10);


    //testing-------
        for($i=0;$i<count($header1);$i++){
            if($i<12){
                $fpdf->Cell($weights[$i],15,$header1[$i],1,0,'C');
		    }
            else if($i>12){
                $fpdf->Cell($weights[$i+1],15,$header1[$i],1,0,'C');
		    }
            else{
                $sweight=$weights[$i];
                $fpdf->Cell($weights[$i]*2,7,$header1[$i],1,0,'C');
		    }
        }
        $fpdf->Cell(0,7,"",0,1);

        $fpdf->Cell($gapR,8,"",0,0,'C');
        for($i=0;$i<count($header2);$i++){
           $fpdf->Cell($sweight,8,$header2[$i],1,0,'C');
        }
        $fpdf->Cell($gapL,8,"",0,0,'C');
    //---------------
        $fpdf->Ln();
        
        

        $fpdf->SetFontSize(7);
        for($j=0;$j<48;$j+=2){
            $fpdf->SetFont('Arial','B',9);
            $fpdf->Cell($weights[0],10,$j/2+1,1,0,'C');//number column
            $fpdf->Cell($weights[1],10,$offenceWithCounts[$j],1,0,'L');//offence name column
            $fpdf->SetFont('Arial');
            for($i=0;$i<15;$i++){
                $fpdf->Cell($weights[$i+2],10,$offenceWithCounts[$j+1][$i],1,0,'C');//original->$weights[$i+1]
            }
            $fpdf->Ln();
		}
        $fpdf->Output();

       
    }
}
