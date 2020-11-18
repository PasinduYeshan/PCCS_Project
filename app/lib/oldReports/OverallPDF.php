<?php
require_once (ROOT.'/app/lib/PDFAdapter.php');


class OverallPDF extends PDFAdapter
{
    function generatePDF($finesheets){
        $weights = array(20,20,35,30,20,20,20,20,20,20,15,20,15);
        $header = array('Sheet No','Vehicle No','Full Name','Address','Fine Date','Fine Time','Place','Offence','Licence No','ID No','Fine','Officer ID','Status');

        ob_start();
        $pdf = new PDFAdapter();
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4',0);
        // $pdf->Ln();
        if($finesheets != null){
            $pdf->Cell(0,10,'There are '.count($finesheets).' records found');
        $pdf->Ln();
        }


        for($i=0;$i<count($header);$i++){
            $pdf->Cell($weights[$i],10,$header[$i],1,0,'C');
        }

        $pdf->Ln();
        $pdf->SetFont('Arial');
        $pdf->SetFontSize(8);
        foreach($finesheets as $row){
            $pdf->Cell($weights[0],10,$row->sheet_no,1,0,'C');
            $pdf->Cell($weights[1],10,$row->vehicle_no,1,0,'C');
            $pdf->Cell($weights[2],10,$row->full_name,1,0,'C');
            $pdf->Cell($weights[3],10,$row->address,1,0,'C');
            $pdf->Cell($weights[4],10,$row->fine_date,1,0,'C');
            $pdf->Cell($weights[5],10,$row->fine_time,1,0,'C');
            $pdf->Cell($weights[6],10,$row->place,1,0,'C');
            $pdf->Cell($weights[7],10,$row->offence,1,0,'C');
            $pdf->Cell($weights[8],10,$row->licence_no,1,0,'C');
            $pdf->Cell($weights[9],10,$row->id_no,1,0,'C');
            $pdf->Cell($weights[10],10,$row->fine,1,0,'C');
            $pdf->Cell($weights[11],10,$row->officer_id,1,0,'C');
            $pdf->Cell($weights[12],10,($row->status==0)?'Unpaid':'Paid',1,0,'C');
            $pdf->Ln();
        }

        $pdf->Output('I','report.pdf');
        ob_end_flush();

    }
}


