<?php 
require_once './repository/ProductRepository.php';

class ProductController {
    
    private $view;
    
    public function __construct(){
        $this->repository = new ProductRepository();
    }
    
    
    public function shop(){
        $this->repository->test();
    }
}