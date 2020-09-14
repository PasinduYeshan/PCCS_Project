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
                $branchReport = new OverallReport($_POST['start_date'],$_POST['end_date']);
                $branchGroup = new BranchGroup(); //BranchGroup
                $branchGroup->accept($branchReport);
                $reportArray = $branchReport->getReportArray();
                $offenceWithCounts=$this->FinalArrayGenerate($reportArray);
                $heading="OVERALL REPORT";
                $this->overallPdfReport($offenceWithCounts,$heading);
		        
         	}
        $this->view->render('report/overallreport');

    }
     public function FinalArrayGenerate($reportArray){
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
        return $offenceWithCounts;
	 }
     
    public function branchreportAction(){
    if(currentUser()->acl=='["BranchOIC"]'){
            $oic = new OIC();
            $branch = new BranchDomain($oic->findById(currentUser()->id)[0]->branch);
            if ($_POST){
            $branchReport = new BranchReport($_POST['start_date'],$_POST['end_date']);
            $branch->accept($branchReport);
            $reportArray = $branchReport->getReportArray();
            $offenceWithCounts=$this->FinalArrayGenerate($reportArray);
            $heading="BRANCH REPORT - ".$branch->getBranchName();
            $this->branchPdfReport($offenceWithCounts,$heading);
            
            }
        }
        else if (currentUser()->acl=='["HigherOfficer"]'){
            if ($_POST){
                $branchReport = new BranchReport($_POST['start_date'],$_POST['end_date']);
                if($_POST['branch_id']<=15 && $_POST['branch_id']>=1){
                    $branch = new BranchDomain($_POST['branch_id']); //BranchGroup
                    $branch->accept($branchReport);
                    $reportArray = $branchReport->getReportArray();
            $offenceWithCounts=$this->FinalArrayGenerate($reportArray);
            $heading="BRANCH REPORT - ".$branch->getBranchName();
            $this->branchPdfReport($offenceWithCounts,$heading);
                }
            }
        }
        $this->view->render('report/branchreport');
    }

    public function overallPdfReport($offenceWithCounts,$heading){
        //$pdf = new OverallPDF();
        //$pdf->generatePDF($finesheets);
        $overallPDF = new ConcreteAdapter3(new FPDF());//ConcreteAdapter1=OverallPDF
        $overallPDF->setHeader($heading);
        $overallPDF->generatePDF($offenceWithCounts);
        $overallPDF->setFooter();
    }

    public function branchPdfReport($offenceWithCounts,$heading){
        //$pdf = new BranchPDFtest();
        //$pdf->generatePDF($offenceWithCounts);
        $branchPDF = new ConcreteAdapter3(new FPDF());//ConcreteAdapter2=branchPDF
        $branchPDF->setHeader($heading);
        $branchPDF->generatePDF($offenceWithCounts);
        $branchPDF->setFooter();
    }
}

/*
    public function branchPdfReport($offenceWithCounts,$branch){
       // $pdf = new BranchPDFtest();
        //$pdf->generatePDF($offenceWithCounts,$branch);
        $branchPDF = new ConcreteAdapter2(new FPDF());//ConcreteAdapter2=branchPDF
        $branchPDF->setHeader($branch);
        $branchPDF->generatePDF($offenceWithCounts);
        $branchPDF->setFooter();
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
*/
