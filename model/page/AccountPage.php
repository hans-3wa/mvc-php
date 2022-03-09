<?php 
require_once "./service/Utils.php";
require_once "./view/AbstractView.php";

class AccountPage extends AbstractView {
    
    private string $html;
    
    public function __construct($html)
    {
        $this->html = $html ?? '';
        parent::__construct();
        $this->head->setTitle('Acount');
        $this->body = $this->utils->searchHtml($this->html);
        $this->setHeader();
        $this->setFooter();
        $this->constructPage();
    }
    
    
}