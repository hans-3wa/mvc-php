<?php 
require_once "./service/Utils.php";
require_once "./model/template/HeadTemplate.php";

abstract class AbstractView {
    
    public $page;
    
    public $head;
    
    public $header;
    
    public $body;
    
    public $footer;
    
    public $javascript; 
    
    public $utils;
    
    public function __construct()
    {
        $this->utils = new Utils();
        $this->head = new HeadTemplate();
        $this->header = $this->utils->searchInc('header');
        $this->footer = $this->utils->searchInc('footer');
    }
    
    protected function setHeader($header = false){
        $this->header = $header ? $this->utils->searchInc($header) : "";
    }
    
    protected function setBody($body = false){
        $this->body = $body;
    }
    
    protected function setFooter($footer = false){
        $this->footer = $footer ? $this->utils->searchInc($footer) : "";
    }
    
    protected function setJavascript($script){
        $this->javascript .= $script ? $this->utils->searchScript($script) : '';
    }
    
    public function getPage(): string 
    {
        return $this->page;
    }
    
    
    public function constructPage(){
        $this->page .= $this->head->getContent();
        $this->page .= $this->header;
        $this->page .= $this->body;
        $this->page .= $this->footer;
        $this->page .= $this->javascript;
    }
    
}