<?php
// Router
session_start();

require_once './controller/HomeController.php';
require_once './controller/UserController.php';
require_once './controller/ProductController.php';

$url = $_GET['url'] ?? "home";

switch($url){
    // Route index.php?url=home
    case "home" : 
        $homeController = new HomeController();
        $homeController->home();
        break;
    
    // Route index.php?url=account
    case "account" :
        $userController = new UserController();
        $userController->account();
        break;
    
    // Route index.php?url=login
    case "login" :
        $userController = new UserController();
        $userController->login();
        break;
    
    case "securityLogin" : 
        $userController = new UserController();
        $userController->securityLogin();
        break;
    
    case "logout" : 
        $userController = new UserController();
        $userController->logout();
        break;
        
    // Route index.php?url=shop
    case "shop" :
        $homeController = new HomeController();
        $homeController->shop();
        break;
        
    case "product":
        $productController = new ProductController();
        $productController->getProduct();
    
    case "404":
        echo "Welcolm 404 mon poto :)";
}

