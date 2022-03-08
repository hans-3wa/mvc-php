<?php 
require_once './view/HomeView.php';
require_once './repository/ProductRepository.php';

class HomeController {
    
    private $view;
    
    public function __construct(){
        $this->view = new HomeView();
    }
    
    
    public function home(){
        $this->view->displayHome();
    }
    
    public function shop(){
        $productRepository = new ProductRepository();
        $products = $productRepository->fetchAll();
        var_dump($products);
        die();
        $this->view->displayShop($products);
    }
}