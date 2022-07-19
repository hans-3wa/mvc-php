<?php 
namespace App\Controller;

use App\View\UserView;
use App\Repository\UserRepository;
use App\Model\Entity\User;
use Exception;

class UserController {
    
    private UserView $view;
    private UserRepository $repository;

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
        $email = $_GET['email'] ?? '';
        $code = isset($_GET['code']) ? (int)$_GET['code'] : 200;
        $errors = [];
        
        if($code === 401){
            $errors = ["email" => $email, "message" => "Identifiants incorrects"];
        }
        //var_dump($email, $code, $errors); die();
        
        echo $this->view->displayLogin($errors);
    }
    
    public function securityLogin(): void
    {
        if(!isset($_POST['email'], $_POST['password'])){
            header('location: ./index.php?url=login');
            exit();
        }
        
        if(!$_SESSION['csrf'] || $_SESSION['csrf'] !== $_POST['csrf_token']){
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
        }
        else {
            header('location: ./index.php?url=login&email='.$email.'&code=401');
        }
        exit();
    }
    
    public function logout(): void
    {
        session_destroy();
        header('location: ./index.php');
        exit();
    }
}