<?php

class UserController extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
    }
}