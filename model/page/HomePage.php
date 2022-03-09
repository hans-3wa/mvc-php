<?php 
require_once "./service/Utils.php";

class HomePage extends AbstractView {
    
    public function __construct()
    {
        parent::__construct();
        $this->body = $this->utils->searchHtml('index');
        $this->constructPage();
        
    }

}