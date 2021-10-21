<?php


class AdminController extends Controller{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function registerUserAction(){
        $validation = new Validate();
        $userTypes = ['["Offender"]'=>['table'=>'offender','field'=>'offender_id'],
                    '["TrafficOfficer"]'=>['table'=>'traffic_officer','field'=>'id_no'],
                    '["HigherOfficer"]'=>['table'=>'dig','field'=>'id_no'],
                    '["BranchOIC"]'=>['table'=>'oic','field'=>'id_no'],
                    '["PaymentOfficer"]'=>['table'=>'payment_officer','field'=>'id_no']
        ];
        $posted_values = ['fname'=>'','lname'=>'','username'=>'','email'=>'','password'=>'','confirm'=>'' , 'id' => ''];
        if ($_POST){
            $posted_values = posted_values($_POST);
            $validation->check($_POST,[
                'fname' => [
                    'display' => 'First Name',
                    'required' => true
                ],
                'lname' => [
                    'display' => 'Last Name',
                    'required' => true
                ],
                'id' => [
                    'display' => 'ID',
                    'required' => true,
                    'unique' => 'users',
                    'is_numeric'=>true,
                    'exist'=>(isset($_POST['acl']))?$userTypes[$_POST['acl']]['table'].','.$userTypes[$_POST['acl']]['field']:''
                ],
                'username' => [
                    'display' => 'Username',
                    'required' => true,
                    'unique' => 'users',
                    'min' => 6,
                    'max' => 150
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'users',
                    'max' => 150,
                    'valid_email' => true
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' => true,
                    'matches' => 'password'
                ]
            ]);
            if (!isset($_POST['acl'])){
                $validation->addError(["Please select a user type",'acl']);
            }

            if ($validation->passed()){
                $newUser = new Users();
                //$_POST['acl'] = htmlspecialchars_decode($_POST['acl'],ENT_QUOTES);
                $newUser->registerNewUser($_POST);
                Router::redirect('home');
            }
        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('admin/registerUser');
    }
}

