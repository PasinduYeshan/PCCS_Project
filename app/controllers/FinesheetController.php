<?php

class FinesheetController extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller,$action);
        //$this->view->setLayout('default');
        $this->load_model('Finesheet');

    }


    public function addAction(){
        $finesheet = new Finesheet();
        $validation = new Validate();
        $trafficOfficer = new TrafficOfficer();  //to get the police id from the user id
        // $fineValidation = new Validate(); //
        $offence = new Offence();         //
        $vehicleTypes = file_get_contents(ROOT.DS.'app'.DS.'vehicle.json');
        $vehicleTypes = json_decode($vehicleTypes, true);
        if ($_POST){
            $fine=0;
            if (isset($_POST['offence'])) {
                foreach ($_POST['offence'] as $offence_no){
                    $fine += (int)$offence->findById($offence_no)[0]->fine;
                }
            }
            $finesheet->assign($_POST);
            //Finesheet::$addValidation['fine']['max_value'] = (int)$offence->findById($_POST['offence'])[0]->fine;
            $validation->check($_POST, Finesheet::$addValidation);
            // $validation->check($_POST['offence'],$offence->getValidation());        //
            if ($validation->passed()){                 //
                $finesheet->officer_id = $trafficOfficer->findById(currentUser()->id)[0]->police_id;
                $finesheet->fine = $fine;
                $finesheet->due_date = date('Y-m-d',strtotime($finesheet->fine_date. ' + 7 days'));
                $finesheet->offence = implode(",",$_POST['offence']);
                $finesheet->save();
                Router::redirect('home');
            }

        }
        $this->view->vehicleTypes = $vehicleTypes;
        $this->view->offencelist = $offence->findAll();
        $this->view->finesheet = $finesheet;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->postAction = PROOT .lcfirst($this->_controller). DS . 'add';
        $this->view->render('finesheet/add');
    }

    public function detailsAction() {
        if ($_POST){
            if (!empty(trim($_POST['id_no'])) && empty(trim($_POST['sheet_no']))){
                $finesheets = $this->FinesheetModel->findById(trim($_POST['id_no']),['order'=>'sheet_no']);
            }
            elseif (!empty(trim($_POST['id_no'])) && !empty(trim($_POST['sheet_no']))){
                $finesheets = $this->FinesheetModel->findByIDandFinesheet(trim($_POST['id_no']),trim($_POST['sheet_no']),['order'=>'sheet_no']);
            }
            elseif (empty(trim($_POST['id_no'])) && !empty(trim($_POST['sheet_no']))){
                $finesheets = $this->FinesheetModel->findByFinesheet(trim($_POST['sheet_no']),['order'=>'sheet_no']);
            }
            $this->view->finesheets = $finesheets;
        }
        $this->view->controller = lcfirst($this->_controller);
        $this->view->render('finesheet/details');
    }

    public function viewAction($sheet_no){
        $offence = new Offence(); 
        $finesheet = $this->FinesheetModel->findByFinesheet($sheet_no);
        if (!$finesheet){
            Router::redirect('finesheet');
        }
        $this->view->finesheet = $finesheet;
        $offenceList = $offence->getOffence($finesheet[0]->offence);
        $this->view->offenceList = $offenceList;
        $this->view->controller = lcfirst($this->_controller);

       // dnd($finesheet[0]->sheet_no);
        $this->view->render('finesheet/view');

    }

    public function myfinesAction(){
        $finesheets = $this->FinesheetModel->findById(currentUser()->id,['order'=>'sheet_no']);
        $this->view->finesheets = $finesheets;
        $this->view->controller = lcfirst($this->_controller);
        $this->view->render('finesheet/myfines');
    }
    public function duefinesAction(){
        $finesheets = $this->FinesheetModel->findUnpaidById(currentUser()->id,['order'=>'sheet_no']);
        $this->view->finesheets = $finesheets;
        $this->view->controller = lcfirst($this->_controller);
        $this->view->render('finesheet/duefines');
	}

    public function fineamountAction(){
        $offence = new Offence();
        $fineamount = 0;
        if (isset($_POST['offence'])===true && empty($_POST['offence'])===false){
            foreach ($_POST['offence'] as $offence_no){
                $fineamount += (int)$offence->findById($offence_no)[0]->fine;
            }
            echo "Rs ".$fineamount.".00";
        }
        else echo "Rs ".$fineamount.".00";
    }

    public function notifyOIC(){
        $offender = new Offender();
        $oic = new OIC();
        $finesheets =  $this->FinesheetModel->findUnpaidByDueDate(date("Y-m-d"));
        foreach ($finesheets as $finesheet){
            $branch = $offender->findBranchById($finesheet->id_no);
            $oic_email = $oic->findEmailByBranch($branch);
            //$a = $this->sendEmail('emailclienttest69@gmail.com',$oic_email);
            sendEmail('emailclienttest69@gmail.com',$oic_email);
        }
    }

    



}
