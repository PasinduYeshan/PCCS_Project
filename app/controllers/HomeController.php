<?php

class HomeController extends Controller {
    private $reportArray;
    public function __construct($controller, $action){
        parent::__construct($controller, $action);

        // $reportArray = [];
        // $vehicleTypes = file_get_contents(ROOT.DS.'app'.DS.'vehicle.json');
        // $vehicleTypes = json_decode($vehicleTypes, true);
        // // foreach ($offences as $offence){
        // //     $offenceCount = [];
        // //     foreach ($vehicleTypes as $key => $vehicle){
        // //         $offenceCount[$vehicle["vehicle_type"]] = 0;
        // //     }
        // //     $reportArray[$offence->offence_id] = $offenceCount;
        // // }
        // $offenceModel = new Offence;
        // $offences = $offenceModel->findAll();
        // foreach ($vehicleTypes as $key => $vehicle){
        //     $offenceCount = [];
        //     foreach ($offences as $offence){
        //         $offenceCount[$offence->offence_id] = 0;
        //     }
        //     $reportArray[$vehicle["vehicle_type"]] = $offenceCount;
        // }
        // $this->reportArray = $reportArray;

    }

    public function indexAction(){
        // $vehicleType = "SLTB";
        // $offences = ["2","4","2","3"];
        // foreach($this->reportArray as $vehicle => $offenceType){
        //     if($vehicle == $vehicleType){
        //         foreach ($offences as $offence){
        //             $this->reportArray[$vehicle][$offence] += 1;
        //         }
        //     }
        // }
        
        //This is how we can get the aray for the report
        
        $branch_id = 1;
        $branchReport = new BranchReport();
        $branch = new BranchDomain($branch_id);
        $branch->accept($branchReport);
        $reportArray = $branchReport->getReportArray();
        //dnd($reportArray);


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
