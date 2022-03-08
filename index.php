<?php
// Router
session_start();

require "./controller/HomeController.php";
require "./controller/UserController.php";
require "./controller/ProductController.php";

$url = isset($_GET['url']) ? $_GET['url'] : "home"; 

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
        
    // Route index.php?url=shop
    case "shop" :
        $homeController = new HomeController();
        $homeController->shop();
        break;
}


