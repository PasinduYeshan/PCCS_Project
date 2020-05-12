<?php


class LicenceController extends Controller{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Licence');

    }

    public function mylicenceAction(){
        $licence = $this->LicenceModel->findById(currentUser()->id);
        $this->view->licence = $licence;
        $this->view->controller = lcfirst($this->_controller);
        $this->view->render('licence/mylicence');
    }

}