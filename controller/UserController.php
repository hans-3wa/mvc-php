<?php 
require_once './view/UserView.php';
require_once './repository/UserRepository.php';
require_once './model/User.php';

class UserController {
    
    private $view;
    
    public function __construct()
    {
        $this->view = new UserView();
        $this->repository = new UserRepository();
    }
    
    public function account(): void
    {
        if(!$_SESSION['user']){
            header('location: ./index.php?url=login');
        }
        
        echo $this->view->displayAccount();
    }
    
    public function login(): void
    {
        echo $this->view->displayLogin();
    }
    
    public function securityLogin() 
    {
        if(!isset($_POST['email'], $_POST['password'])){
            header('location: ./index.php?url=login');
            exit();
        }
        
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $data = $this->repository->fetchLogin($email, $password);
        
        if($data){
            
            $user = new User();
            $user->setid($data['id']);
            $user->setName($data['name']);
            $user->setFirstName($data['first_name']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setRole($data['roles']);
            
            $_SESSION['user'] = $user->getName();
            
            header('location: ./index.php?url=account');
            exit();
        } 
        else {
            header('location: ./index.php?url=login');
            exit();
        }
        
    }
    
    public function logout(): void
    {
        session_destroy();
        header('location: ./index.php');
        exit();
    }
}