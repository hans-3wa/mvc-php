<?php 
require_once './view/AbstractView.php';
require_once './model/page/ShopPage.php';
require_once './model/page/HomePage.php';

class HomeView extends AbstractView {
    
    /**
     * @return string
     */ 
    public function displayHome(): string
    {
        $this->head->setTitle('Accueil');
        $this->head->setDescription('Description');
        $body = new HomePage();
        $this->setBody($body->getPage());
        $this->setJavascript('home');
        return $this->displayPage();
    }
    
    /**
     * @param string
     */ 
    public function displayShop($products): string
    {
        $shopPage = new ShopPage();
        $shopPage->setProducts($products);
        $this->setBody($shopPage->getContent());
        return $this->displayPage();
    }
}