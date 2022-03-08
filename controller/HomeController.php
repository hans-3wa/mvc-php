<?php 
require_once './view/HomeView.php';
require_once './repository/ProductRepository.php';
require_once './model/Product.php';

class HomeController {
    
    private $view;
    
    public function __construct(){
        $this->view = new HomeView();
    }
    
    public function home(): void
    {
        echo $this->view->displayHome();
    }
    
    public function shop(): void
    {
        $productRepository = new ProductRepository();
        $datas = $productRepository->fetchAll();
        $products = [];
        
        foreach($datas as $data){
            $product = new Product();
            $product->setId($data['id']);
            $product->setName($data['name']);
            $product->setQuantity($data['quantity']);
            $product->setPrice($data['price']);
            $product->setUrlPicture($data['url_picture']);
            $product->setDescription($data['description']);
            
            $products[] = $product;
        }
        
        echo $this->view->displayShop($products);
    }
}