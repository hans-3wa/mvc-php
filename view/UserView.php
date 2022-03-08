<?php 
require_once './view/AbstractView.php';

class UserView extends AbstractView {
    
    public function displayAccount(){
        $this->head->setTitle('Profil');
        $this->setHeader();
        $this->setBody('account');
        $this->setFooter();
        $this->setJavascript('main');
        $this->displayPage();
    }
}