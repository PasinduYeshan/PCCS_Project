<?php
include_once(ROOT."/app/lib/OverallPDF.php");

class ReportController extends Controller{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Finesheet');
    }


    public function overallreportAction(){

        if ($_POST){
            $finesheets = $this->FinesheetModel->findBetweenDates($_POST['start_date'],$_POST['end_date'],['order'=>'sheet_no']);
            $this->overallPdfReport($finesheets);
        }

        $this->view->render('report/overallreport');

    }

    public function branchreportAction(){
        if ($_POST){
            // $branchReport = new BranchReport();
            $finesheets = $this->FinesheetModel->findBetweenDates($_POST['start_date'],$_POST['end_date'],['order'=>'sheet_no']);
            $this->overallPdfReport($finesheets);
        }
        


    }

    public function overallPdfReport($finesheets){
        $pdf = new OverallPDF();
        $pdf->generatePDF($finesheets);
    }
    
        public function branchreportAction(){
        $sampleCounts = array(20,35,30,20,20,20,20,20,20,15,20,15,1,1,1);
        //dnd(array_slice($sampleCounts,10));
        //array_push($sampleCounts,array_sum(array_slice($sampleCounts,12)));
        //dnd($sampleCounts);
        
        $offence=new Offence();
        $offenceNames=array();
        $offenceWithCounts=array();
         for($i=1;$i<26;$i++){
            $offences=$offence->findById($i);
            foreach($offences as $of){
                //echo "$of->offence_name" ;
                //echo"<br>";
                array_push($offenceNames,"$of->offence_name");
		    }
            array_push($offenceWithCounts,"$of->offence_name",$sampleCounts);
        }
        //dnd($offenceWithCounts[1][0]);//[[name],[counts]];
        //print_r($offenceWithCounts[1][1]);
        
        $this->branchPdfReport($offenceWithCounts);
    }

    public function branchPdfReport($offenceWithCounts){
        $pdf = new BranchPDFtest();
        //$pdf = new BranchPDF();
        //$pdf=new BranchPDFTest2();
        $pdf->generatePDF($offenceWithCounts,"Kollupitiya");
    }
}
