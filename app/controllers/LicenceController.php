<?php


class LicenceController extends Controller{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Licence');
        $this->load_model('');

    }

    public function mylicenceAction(){
        $licence = $this->LicenceModel->findById(currentUser()->id);
        $this->view->licence = $licence;
        $this->view->controller = lcfirst($this->_controller);
        $this->view->render('licence/mylicence');
    }

    public function detailsByNICAction(){
        if ($_POST){
            $licence = $this->LicenceModel->findByNIC($_POST['nic']);
            if($licence){
                $this->view->licence = $licence;
                $this->view->controller = lcfirst($this->_controller);
            }else{ //What happen when there are no licence 

            }
        }
        $this->view->render('licence/mylicence'); //Change the page 
    }

    public function detailsByLicenceNumberAction(){
        if ($_POST){
            $licence = $this->LicenceModel->findByLicence($_POST['licence_no']);
            if($licence){
                $this->view->licence = $licence;
                $this->view->controller = lcfirst($this->_controller);
            }else{ //What happen when there are no licence 

            }
        }
        $this->view->render('licence/mylicence'); //Change the page 
    }

}