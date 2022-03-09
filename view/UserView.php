<?php 
require_once './view/AbstractView.php';
require_once './model/page/DefaultPage.php';

class UserView {
    
    /**
     * @return string
     */ 
    public function displayAccount(): string
    {
        $page = new DefaultPage("account");
        return $page->getPage();
    }
    
    /**
     * @return string
     */ 
    public function displayLogin(): string
    {
        $page = new DefaultPage("login");
        return $page->getPage();
    }
}