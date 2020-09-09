<?php


class RegisterController extends Controller{

    public function __construct($controller, $action){
        parent::__construct($controller, $action);
        $this->load_model('Users');
        $this->view->setLayout('default');
    }

    public function loginAction(){
        //echo password_hash('password', PASSWORD_DEFAULT);
        $validation = new Validate();
        if ($_POST){
            //form validation
            $validation->check($_POST,[
                'username' => [
                    'display' => "Username",
                    'required' => true
                ],
                'password' => [
                    'display' => "Password",
                    'required' => true,
                    'min' => 6
                ]
            ]);
            if ($validation->passed()){
                $user=$this->UsersModel->findByUsername($_POST['username']);
                //dnd($user);
                if ($user && password_verify(Input::get('password'),$user->password)){
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me'))?true : false;
                    $user->login($remember);
                    Router::redirect('');
                }

                else{
                    $validation->addError("There is an error with your username or password.");
                }
            }

        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function logoutAction(){
        if (currentUser()){
            currentUser()->logout();
        }
        Router::redirect('register/login');
    }

    public function registerAction(){
        $validation = new Validate();
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
                    'is_numeric'=>true
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

            if ($validation->passed()){
                $newUser = new Users();
                $newUser->registerNewUser($_POST);
                $newUser->login();
                Router::redirect('home');
            }
        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }

    public function accountDetailsAction(){
        $this->view->user = currentUser();
        // dnd($this->view->user->fname);
        $validation = new Validate();
        $posted_values = ['password'=>'','confirm'=>''];
        if ($_POST){
            $posted_values = posted_values($_POST); //Sanitize them
            $validation->check($_POST,[
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

            if ($validation->passed()){
                $newUser = new Users();
                $details = [
                    'id' => currentUser()->id,
                    'password' => $posted_values['password']
                ];
                $newUser->changePassword($details);
                Router::redirect('home');
            }
        }
        
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/account');
    }
}