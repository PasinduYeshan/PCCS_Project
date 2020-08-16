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

}