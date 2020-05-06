<?php

class Home extends Controller{
    public function __construct($controller,$action)
    {
       parent::__construct($controller,$action);
        
    }

    public function indexAction(){
        $db = DB::getInstance();
        /*
        $contacts = $db->findFirst('contacts',[
            'conditions' => ["fname =  ?","lname = ?"],
            'bind' => ['John','Doe']
        ]);
        dnd($contacts);
        */
        $fields = $db->get_columns('contacts');
        dnd($fields);

        $this->view->render('home'. DS .'index'); //Go to relevant view page
    }
}