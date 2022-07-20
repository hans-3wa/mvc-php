<?php
namespace App\View;

use App\Model\Page\DefaultPage;
use App\Model\Page\ShopPage;

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