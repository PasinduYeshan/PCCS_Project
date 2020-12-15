<?php

class ReportController extends Controller{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Finesheet');
    }


    public function overallreportAction(){
           $validation = new Validate();
           if ($_POST){
                $validation->check($_POST,[
                    'start_date'=>[
                        'display'=>'Start Date',
                        'required'=> true,
                        'future_date_check'=> '*'
                    ],
                    'end_date' =>[
                        'display' => 'End Date',
                        'required'=> true,
                        'future_date_check' => '*'
                    ]
                ]);
                if (($_POST['start_date'])>$_POST['end_date'] && $_POST['end_date']!=""){ //last condition because otherwise even if we only select start_date error msg displayed
                   $validation->addError("Start date cannot be ahead of the end date");
                }
                if ($validation->passed()){
                    $overallReport = new OverallReport($_POST['start_date'],$_POST['end_date']);
                    $branchGroup = new BranchGroup(); //BranchGroup
                    $branchGroup->accept($overallReport);
                    $reportArray = $overallReport->getReportArray();
                    $offenceWithCounts=$this->FinalArrayGenerate($reportArray);
                    $heading="OVERALL REPORT";
                    $this->overallPdfReport($offenceWithCounts,$heading);
                }
		        
         	}
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('report/overallreport');

    }
     public function FinalArrayGenerate($reportArray){
        $offenceCountsAll=array();
        $vehicleTypes = file_get_contents(ROOT.DS.'app'.DS.'vehicle.json');
        $vehicleTypes = json_decode($vehicleTypes, true);

        // $vehicleNames=array('SLTB','Private','Lorry','Container','Car','Dual','Motorcycle','Three-Wheeler','Light bus','Light Lorry','Tractor','Hand tractor','Bicycle','Pedestrian');
        for ($x = 1; $x <= 33; $x++) {
            $offenceCountEach=array();
            foreach ($vehicleTypes as $vehicleType) {
                $offenceCountEach[$vehicleType["vehicle_type"]]=$reportArray[$vehicleType["vehicle_type"]][$x];
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
        $validation = new Validate();
        if(currentUser()->acl=='["BranchOIC"]'){
            $oic = new OIC();
            $branch = new BranchDomain($oic->findById(currentUser()->id)[0]->branch);
            if ($_POST){
                $validation->check($_POST,[
                    'start_date'=>[
                        'display'=>'Start Date',
                        'required'=> true,
                        'future_date_check'=> '*'
                    ],
                    'end_date' =>[
                        'display' => 'End Date',
                        'required'=> true,
                        'future_date_check' => '*'
                    ]
                ]);
                if (($_POST['start_date'])>$_POST['end_date'] && $_POST['end_date']!=""){
                    $validation->addError("Start date cannot be ahead of the end date");
                }
                if ($validation->passed()){
                    $branchReport = new BranchReport($_POST['start_date'],$_POST['end_date']);
                    $branch->accept($branchReport);
                    $reportArray = $branchReport->getReportArray();
                    $offenceWithCounts=$this->FinalArrayGenerate($reportArray);
                    $heading="BRANCH REPORT - ".$branch->getBranchName();
                    $this->branchPdfReport($offenceWithCounts,$heading);
                }

            
            }
        }
        else if (currentUser()->acl=='["HigherOfficer"]'){
            $branchModel = new Branch();
            $this->view->branchlist = $branchModel->findAll();
            if ($_POST){
                $validation->check($_POST,[
                    'start_date'=>[
                        'display'=>'Start Date',
                        'required'=> true,
                        'future_date_check'=> '*'
                    ],
                    'end_date' =>[
                        'display' => 'End Date',
                        'required'=> true,
                        'future_date_check' => '*'
                    ]
                ]);
                if (($_POST['start_date'])>$_POST['end_date'] && $_POST['end_date']!=""){
                    $validation->addError("Start date cannot be ahead of the end date");
                }
                if (!isset($_POST['branch'])){
                    $validation->addError(["Please select a branch",'branch']);
                }
                if ($validation->passed()){
                    $branchReport = new BranchReport($_POST['start_date'],$_POST['end_date']);
                    $branch = new BranchDomain($_POST['branch']); //BranchGroup
                    $branch->accept($branchReport);
                    $reportArray = $branchReport->getReportArray();
                    $offenceWithCounts=$this->FinalArrayGenerate($reportArray);
                    $heading="BRANCH REPORT - ".$branch->getBranchName();
                    $this->branchPdfReport($offenceWithCounts,$heading);
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('report/branchreport');
    }

    public function overallPdfReport($offenceWithCounts,$heading){
        $overallPDF = new PDFAdapter(new FPDF());//ConcreteAdapter1=OverallPDF
        $overallPDF->setHeader($heading);
        $overallPDF->generatePDF($offenceWithCounts);
        $overallPDF->setFooter();
    }

    public function branchPdfReport($offenceWithCounts,$heading){
        //$pdf = new BranchPDFtest();
        //$pdf->generatePDF($offenceWithCounts);
        $branchPDF = new PDFAdapter(new FPDF());//ConcreteAdapter2=branchPDF
        $branchPDF->setHeader($heading);
        $branchPDF->generatePDF($offenceWithCounts);
        $branchPDF->setFooter();
    }
}