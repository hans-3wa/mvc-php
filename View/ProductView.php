<?php
namespace App\View;

use App\Model\Entity\Product;
use App\Model\Page\ProductPage;
use App\Model\Page\ShopPage;

class ProductView extends AbstractView {
    
    /**
     * @param array $products
     * @return string
     */
    public function displayShop(array $products): string
    {
        $shopPage = new ShopPage();
        $shopPage->setProducts($products);
        $shopPage->head->setTitle('Boutique');
        $shopPage->constructShop();
        return $shopPage->getPage();
    }

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