<?php

class Home extends Controller{
    public function __construct($controller,$action)
    {
       parent::__construct($controller,$action);
        
    }

    public function indexAction(){
        $db = DB::getInstance();
        $contacts = $db->query("SELECT * FROM contacts ORDER BY lname,fname")->results();
        dnd($contacts[1]->fname);
        //dnd($db->get_columns('contacts'));
        $this->view->render('home'. DS .'index'); //Go to relevant view page
    }
}