<?php 
require_once './view/AbstractView.php';
require_once './model/page/LoginPage.php';
require_once './model/page/AccountPage.php';

class UserView extends AbstractView {
    
    /**
     * @return string
     */ 
    public function displayAccount(): string
    {
        $this->head->setTitle('Profil');
        $this->setHeader();
        $body = new AccountPage();
        $this->setBody($body->getPage());
        $this->setFooter();
        $this->setJavascript('main');
        
        return $this->displayPage();
    }
    
    /**
     * @return string
     */ 
    public function displayLogin(): string
    {
        $this->head->setTitle('Login');
        $body = new LoginPage();
        $this->setBody($body->getPage());
        $this->setFooter();
        $this->setJavascript('main');
        
        return $this->displayPage();
    }
}