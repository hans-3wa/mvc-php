<?php

namespace App\Controller;

use App\Model\Entity\User;
use App\View\SecurityView;
use App\Repository\UserRepository;

class SecurityController {

    private SecurityView $view;
    private UserRepository $repository;

    public function __construct()
    {
        $this->view = new SecurityView();
        $this->repository = new UserRepository();
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
            exit();
        }
        else {
            $_SESSION['codeError'] = 401;
            $_SESSION['messageError'] = ['email' => $email];
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
        $lastName = $_GET['lastName'] ?? '';
        $firstName = $_GET['firstName'] ?? '';
        $email = $_GET['email'] ?? '';
        $code = isset($_GET['code']) ? (int)$_GET['code'] : 200;
        $errors = [];

        if($code === 401){
            $errors = ["lastName" => $lastName, "firstName" => $firstName, "email" => $email, "message" => "Identifiants incorrects"];
        }
        //var_dump($email, $code, $errors); die();

        echo $this->view->displayRegister($errors);
    }

    public function securityRegister(): void
    {

        if(!$_SESSION['csrf'] || $_SESSION['csrf'] !== $_POST['csrf_token']){
            header('location: ./index.php?url=register');
            exit();
        }


        $lastName = htmlspecialchars($_POST['lastName']);
        $firstName = htmlspecialchars($_POST['firstName']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User();
        $user->setName($lastName);
        $user->setFirstName($firstName);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setRole('user');

        $query = $this->repository->insertUser($user);

        $_SESSION['user'] = serialize($user);
        header('location: ./index.php?url=account');
        exit();

    }
}