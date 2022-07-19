<?php
namespace App\View;

use App\Model\Page\DefaultPage;
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
     * @param array $errors
     * @return string
     * @throws \Exception
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