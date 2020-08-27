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
         if(currentUser()->acl=='["BranchOIC"]'){
             $oic = new OIC();
             $branch = new BranchDomain($oic->findById(currentUser()->id)[0]->branch);
             if ($_POST){
                 $branchReport = new BranchReport($_POST['start_date'],$_POST['end_date']);
                 $this->getReportArray($branchReport,$branch);
             }
         }
         else if (currentUser()->acl=='["HigherOfficer"]'){
             if ($_POST){
                 $branchReport = new BranchReport($_POST['start_date'],$_POST['end_date']);
                 if($_POST['branch_id']<=15 && $_POST['branch_id']>=1){
                     $branch = new BranchDomain($_POST['branch_id']); //BranchGroup
                     $this->getReportArray($branchReport,$branch);
                 }
             }
         }
         $this->view->render('report/branchreport');
     }

    public function overallPdfReport($finesheets){
        $pdf = new OverallPDF();
        $pdf->generatePDF($finesheets);
    }

    public function branchPdfReport($offenceWithCounts,$branch){
        $pdf = new BranchPDFtest();
        //$pdf = new BranchPDF();
        //$pdf=new BranchPDFTest2();
        $pdf->generatePDF($offenceWithCounts,$branch);
    }

    public function getReportArray(BranchReport $branchReport,BranchDomain $branch){
        $branch->accept($branchReport);
        $reportArray = $branchReport->getReportArray();
        $offenceCountsAll=array();
        $vehicleNames=array('SLTB','Private','Lorry','Container','Car','Dual','Motorcycle','Three-Wheeler','Light bus','Light Lorry','Tractor','Hand tractor','Bicycle','Pedestrian');
        for ($x = 1; $x <= 33; $x++) {
            $offenceCountEach=array();
            foreach ($vehicleNames as $vehicleType) {
                $offenceCountEach[$vehicleType]=$reportArray[$vehicleType][$x];
            }
            $offenceCountsAll[$x]=$offenceCountEach;
        }
        $offence=new Offence();
        $offenceNames=array();
        $offenceWithCounts=array();
        for($i=1;$i<34;$i++){
            $offences=$offence->findById($i);
            foreach($offences as $of){
                array_push($offenceNames,"$of->offence_name");
            }
            array_push($offenceWithCounts,"$of->offence_name",$offenceCountsAll[$i]);//edited
        }
        $this->branchPdfReport($offenceWithCounts,$branch);
    }
}
