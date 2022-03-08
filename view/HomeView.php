<?php 
require_once './view/AbstractView.php';

class HomeView extends AbstractView {
    
    public function displayHome(){
        $this->head->setTitle('Accueil');
        $this->head->setDescription('Description');
        $this->setBody('index');
        $this->setJavascript('home');
        $this->displayPage();
    }
    
    public function displayShop(){
        $this->displayPage();
    }
}