<?php 
require_once './model/page/DefaultPage.php';

class UserView {
    
    /**
     * @return string
     */ 
    public function displayAccount(): string
    {
        $page = new DefaultPage("account");
        $page->assemblerPage();
        return $page->getPage();
    }
    
    /**
     * @return string
     */ 
    public function displayLogin(array $errors): string
    {
        $page = new DefaultPage("login");
        $page->setErrors($errors);
        
        $_SESSION['csrf'] = bin2hex(random_bytes(15));
        
        $page->setCsrf($_SESSION['csrf']);
        $page->assemblerPage();
        
        return $page->getPage();
    }
}