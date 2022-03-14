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
    
    public function securityLogin(): void
    {
        if(!isset($_POST['email'], $_POST['password'])){
            header('location: ./index.php?url=login');
            exit();
        }
        
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $data = $this->repository->fetchLogin($email);
        
        
        if($data){
            if(!password_verify($password, $data['password'])){
                // Mauvais mot de pass
            }
            $user = new User();
            $user->setid($data['id']);
            $user->setName($data['name']);
            $user->setFirstName($data['first_name']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setRole($data['roles']);
            
            $_SESSION['user'] = serialize($user);
            
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
    
    
    public function register(): void
    {
        echo $this->view->displayRegister();
    }
    
    public function securityRegister(): void
    {
        
        if(strlen($_POST['password']) < 6){
            header('location: ./index.php?url=register');
            exit();
        }else{
            
            $passCrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $user = new User();
            $user->setName(htmlspecialchars($_POST['lastName']));
            $user->setFirstName(htmlspecialchars($_POST['firstName']));
            $user->setEmail(htmlspecialchars($_POST['email']));
            $user->setPassword(htmlspecialchars($passCrypt));
            $user->setRole('Admin');
            
            $data = $this->repository->insertUser($user);
            var_dump($data);
            die();
            if($data){
                $_SESSION['user'] = serialize($user);
                header('location: ./index.php?url=account');
                exit();
            } else {
                header('location: ./index.php?url=register');
                exit();
            }
        }
    }
}