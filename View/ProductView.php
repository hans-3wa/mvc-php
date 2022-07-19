<?php
namespace App\View;
use App\Model\Entity\Product;
use App\Model\Page\ProductPage;

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