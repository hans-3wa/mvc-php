<?php 
require_once "./model/Product.php";


class ProductPage extends AbstractPage {
    
    private Product $product;
    
    public function __construct()
    {
        parent::__construct();
        $this->body = $this->utils->searchInc('productDetail');
    }
    
    
    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
    
    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }
    
    
    public function assemblerPage(): void
    {
        $this->body = str_replace('{% title %}', $this->product->getName(), $this->body);
        $this->body = str_replace('{% description %}', $this->product->getDescription(), $this->body);
        $this->body = str_replace('{% urlImage %}', $this->product->getUrlPicture(), $this->body);
        
        $this->constructPage();
    }
}