<?php 
require_once './view/AbstractView.php';
require_once './model/page/AccountPage.php';

class UserView {
    
    /**
     * @return string
     */ 
    public function displayAccount(): string
    {
        $page = new AccountPage('account');
        return $page->getPage();
    }
    
    /**
     * @return string
     */ 
    public function displayLogin(): string
    {
        $page = new AccountPage('login');
        return $page->getPage();
    }
}