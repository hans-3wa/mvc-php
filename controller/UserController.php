<?php 
require './view/UserView.php';
require './repository/UserRepository.php';

class UserController {
    
    private $view;
    
    public function __construct(){
        $this->view = new UserView();
        $this->repository = new UserRepository();
    }
    
    public function account(){
        $this->view->displayAccount();
    }
    
    public function login(){
        $this->repository->test();
    }
}