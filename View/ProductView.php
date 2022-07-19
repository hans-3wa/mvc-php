<?php
namespace App\View;
require_once './Model/Page/ProductPage.php';
require_once './Model/Product.php';

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