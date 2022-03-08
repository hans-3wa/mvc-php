<?php
// Router
session_start();

require "./controller/HomeController.php";
require "./controller/UserController.php";
require "./controller/ProductController.php";

$url = isset($_GET['url']) ? $_GET['url'] : "home"; 

$homeController = new HomeController();
$userController = new UserController();
$productController = new ProductController();

switch($url){
    // Route index.php?url=home
    case "home" : 
        $homeController->home();
        break;
    
    // Route index.php?url=profile
    case "profile" :
        $userController->account();
        break;
    
    // Route index.php?url=login
    case "login" :
        $userController->login();
        break;
        
    // Route index.php?url=login
    case "shop" :
        $homeController->shop();
        break;
}


