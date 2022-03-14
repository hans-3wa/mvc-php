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
     * @param string
     */ 
    public function displayShop($products): string
    {
        $shopPage = new ShopPage();
        $shopPage->setProducts($products);
        return $shopPage->getPage();
    }
}