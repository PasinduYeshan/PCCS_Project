<?php

class HomeController extends Controller {
    

    public function __construct($controller, $action){
        parent::__construct($controller, $action);

    }

    public function indexAction(){
        // //This is how we can get the aray for the branch report
        // $branch_id = 1;
        // $branchReport = new BranchReport("2020-08-01","2020-08-15");
        // $branch = new BranchDomain($branch_id); //BranchGroup
        // $branch->accept($branchReport);
        // $reportArray = $branchReport->getReportArray();

        //This is how we can get the aray for the overall report
        $branchReport = new OverallReport("2020-08-01","2020-08-15");
        $branchGroup = new BranchGroup(); //BranchGroup
        $branchGroup->accept($branchReport);
        $reportArray = $branchReport->getReportArray();

        //testing array rearraangement-shash
        $offenceCountsAllTypes=array();
        $vehicleNames=array('SLTB','Private','Lorry','Container','Car','Dual','Motorcycle','Three-Wheeler','Light bus','Light Lorry','Tractor','Hand tractor','Bicycle','Pedestrian');
        for ($x = 1; $x <= 33; $x++) {
            $offenceCountEach=array();
            foreach ($vehicleNames as $vehicleType) {
                //dnd($reportArray["SLTB"][1]);
                //echo "$x"." fineType-"."$vehicleType"."Count:";
                //echo $reportArray[$vehicleType][$x];
                //echo "<br>";
                $offenceCountEach[$vehicleType]=$reportArray[$vehicleType][$x];
            }
            //print_r($x);
            //var_dump($offenceCountEach);
            //echo "<br>";
            $offenceCountsAllTypes[$x]=$offenceCountEach;
        }
        //dnd($offenceCountsAllTypes);

        //print_r(array_keys($reportArray));
        //$this->view->render('home/index');
        
        $ReportC=new ReportController($this->_controller,$this->_action);
        $ReportC->branchreportAction($offenceCountsAllTypes);

    }
}
