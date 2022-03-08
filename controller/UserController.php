<?php 
require './view/UserView.php';
require './repository/UserRepository.php';

class UserController {
    
    private $view;
    
    public function __construct()
    {
        $this->view = new UserView();
        $this->repository = new UserRepository();
    }
    
    public function account(): void
    {
        echo $this->view->displayAccount();
    }
    
    public function login(): void
    {
        echo $this->view->displayLogin();
    }
}