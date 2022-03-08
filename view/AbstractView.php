<?php 
require_once "./service/Utils.php";
require_once "./model/template/HeadTemplate.php";
require_once "./model/template/BodyTemplate.php";

abstract class AbstractView {
    
    protected $page;
    
    protected $head;
    
    protected $header;
    
    protected $body;
    
    protected $footer;
    
    protected $javascript; 
    
    private $utils;
    
    public function __construct(){
        
        $this->utils = new Utils();
        
        $this->head = new HeadTemplate();
        $this->body = new BodyTemplate();
        $this->header = $this->utils->searchInc('header');
        $this->footer = $this->utils->searchInc('footer');
    }
    
    protected function setHeader($header = false){
        $this->header = $header ? $this->utils->searchInc($header) : "";
    }
    
    
    protected function setBody($body = false){
        $this->body->setContent($body ?? "");
    }
    
    protected function setFooter($footer = false){
        $this->footer = $footer ? $this->utils->searchInc($footer) : "";
    }
    
    protected function setJavascript($script){
        $this->javascript .= $script ? $this->utils->searchScript($script) : '';
    }
    
    
    protected function constructPage(){
        $this->page .= $this->head->getContent();
        $this->page .= $this->header;
        $this->page .= $this->body->getContent();
        $this->page .= $this->footer;
        $this->page .= $this->javascript;
    }
    
    
    protected function displayPage(){
        $this->constructPage();
        return $this->page;
    }
    
    
}