<?php 
require_once './service/AbstractPage.php';
require_once './model/page/ShopPage.php';
require_once './model/page/DefaultPage.php';

class HomeView {
    
    /**
     * @return string
     */ 
    public function displayHome(): string
    {
        $page = new DefaultPage('index');
        $page->assemblerPage();
        return $page->getPage();
    }
    
    /**
     * @param array $products
     * @return string
     */ 
    public function displayShop(array $products): string
    {
        $shopPage = new ShopPage();
        $shopPage->setProducts($products);
        $shopPage->constructShop();
        return $shopPage->getPage();
    }
}