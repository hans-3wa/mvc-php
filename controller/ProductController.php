<?php 
require_once './repository/ProductRepository.php';
require_once './model/Product.php';
require_once './view/ProductView.php';

class ProductController {
    
    private ProductView $view;
    
    private ProductRepository $repository;
    
    public function __construct(){
        $this->view = new ProductView();
        $this->repository = new ProductRepository();
    }
    
    public function getProduct(): void
    {
        $id = (int)$_GET['product'];
        $data = $this->repository->fetchId($id);
        
        if(!$data){
            header('location: ./index.php?url=404');
        }
        
        $product = new Product();
        $product->setId($data['id']);
        $product->setName($data['name']);
        $product->setQuantity($data['quantity']);
        $product->setPrice($data['price']);
        $product->setUrlPicture($data['url_picture']);
        $product->setDescription($data['description']);
        
        echo $this->view->displayProduct($product);
    }
    
}