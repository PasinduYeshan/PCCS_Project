<?php

class FinesheetController extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
        $this->load_model('Finesheet');

    }


    public function addAction(){
        $finesheet = new Finesheet();
        $validation = new Validate();
        if ($_POST){
            $finesheet->assign($_POST);
            $validation->check($_POST, Finesheet::$addValidation);
            if ($validation->passed()){
                $finesheet->officer_id = currentUser()->id;
                $finesheet->due_date = date('Y-m-d',strtotime($finesheet->fine_date. ' + 7 days'));
                $finesheet->save();
                Router::redirect('home');
            }

        }
        $this->view->finesheet = $finesheet;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->postAction = PROOT . 'finesheet' . DS . 'add';
        $this->view->render('finesheet/add');
    }

    public function detailsAction() {
        //$finesheets = $this->FinesheetModel->findById('1111',['order'=>'sheet_no']);
       // if ($_POST)dnd($_POST);

     //   $this->view->finesheets = $finesheets;
        //dnd($finesheets);
        if ($_POST){
            $finesheets = $this->FinesheetModel->findById($_POST['id_no'],['order'=>'sheet_no']);
            //dnd($finesheets);
            $this->view->finesheets = $finesheets;
            $this->view->controller = lcfirst($this->_controller);
        }

        $this->view->render('finesheet/details');
    }

    public function viewAction($sheet_no){
        $finesheet = $this->FinesheetModel->findByFinesheet($sheet_no);
        if (!$finesheet){
            Router::redirect('finesheet');
        }
        $this->view->finesheet = $finesheet;
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


}