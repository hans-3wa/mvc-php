<?php 
require_once './model/page/ProductPage.php';
require_once './model/Product.php';

class ProductView {
    
    /**
     * @param Product $product
     * @return string
     */ 
    public function displayProduct(Product $product): string
    {
        $page = new ProductPage();
        $page->setProduct($product);
        $page->assemblerPage();
        return $page->getPage();
    }
    
}