<?php

namespace App\Service;

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\UserController;
use App\Controller\SecurityController;


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

            case "updateProfil":
                $userController = new UserController();
                $userController->updateAccount();
                break;

            // Route index.php?url=login
            case "login" :
                $securityController = new SecurityController();
                $securityController->login();
                break;

            case "securityLogin" :
                $securityController = new SecurityController();
                $securityController->securityLogin();
                break;

            case "register" :
                $securityController = new SecurityController();
                $securityController->register();
                break;

            case "securityRegister" :
                $securityController = new SecurityController();
                $securityController->securityRegister();
                break;

            case "logout" :
                $securityController = new SecurityController();
                $securityController->logout();

            // Route index.php?url=shop
            case "shop" :
                $productController = new ProductController();
                $productController->shop();
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