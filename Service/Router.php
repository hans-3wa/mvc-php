<?php

namespace App\Service;

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\UserController;



class Router
{

    public string $path;

    public function executePath(string $url)
    {
        switch ($url) {
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
                break;

            case "search":
                $controller = new ProductController();
                $controller->querySearch();
                break;

            default:
                echo "Welcolm 404 mon poto :)";
                break;
        }
    }

}