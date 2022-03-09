<?php 
require_once './view/AbstractView.php';
require_once './model/page/ShopPage.php';
require_once './model/page/DefaultPage.php';

class HomeView {
    
    /**
     * @return string
     */ 
    public function displayHome(): string
    {
        $page = new DefaultPage('index');
        
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