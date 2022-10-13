<?php
require_once 'app/models/loginModel.php';
require_once 'app/views/loginView.php';

class LoginController {
    private $loginModel;
    private $loginView;
    

    public function __construct() {
        $this->loginModel = new LoginModel();
        $this->loginView = new LoginView();
    }

    function openFormLoging(){
        $this->loginView->showFormLogin();
        }

    function userValidate(){
        if (!empty($_POST ['email'])&& !empty($_POST ['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = $this->loginModel->getUser($email);
            
              if($user && password_verify($password, $user->password)){
               session_start();
               $_SESSION['email']= $email;
               $_SESSION['esta_logeado'] = true;
          
               header("Location: " . BASE_URL . "Libros");


           
            }
            else{
                $this->loginView->showFormLogin("Error de paswword");
            }
        } 
        
    }

    function logout(){
        session_start();
        session_destroy();
        $this->loginView->showFormLogin("Saliste de la cuenta");
    }
}    