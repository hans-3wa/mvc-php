<?php 
require_once './view/AbstractView.php';
require_once './model/page/ShopPage.php';
require_once './model/page/HomePage.php';

class HomeView {
    
    /**
     * @return string
     */ 
    public function displayHome(): string
    {
        $homePage = new HomePage();
        return $homePage->getPage();
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