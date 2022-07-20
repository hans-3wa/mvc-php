<?php
namespace App\Controller;

use App\View\HomeView;
use App\Repository\ProductRepository;
use App\Model\Entity\Product;

class HomeController {
    
    private HomeView $view;
    
    public function __construct(){
        $this->view = new HomeView();
    }
    
    public function home(): void
    {
        echo $this->view->displayHome();
    }
}