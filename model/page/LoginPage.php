<?php 
require_once "./service/Utils.php";

class LoginPage {
    
    
    private string $page;
    
    public Head $head;
    
    private Utils $utils;
    
    public function __construct()
    {
        $this->utils = new Utils();
        $this->page = $this->utils->searchHtml('login');
    }
    
    /**
     * @return string
     */
    public function getpage(): string
    {
        return $this->page;
    }
    
    /**
     * @param string $page
     */
    public function setpage(string $page)
    {
        $this->page = $page;
    }
}