<?php 
require_once "./service/Utils.php";

class Head {
    
    
    private $content;
    
    private $title;
    
    private $description;
    
    private $utils;
    
    public function __construct(){
        $this->utils = new Utils();
        $this->title = "Ma boulangerie";
        $this->description = "Super la boulangerie de mon quartier est enfin ouverte. Je peux acheter croissant, pains au chocolats ainsi que divers pains speciaux & originaux";
        $this->constructHead();
        
    }
    
    public function getContent(){
        return $this->content;
    }
    
    public function setContent($title){
        $this->content = $content;
        $this->constructHead();
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function setTitle($title){
        $this->title = $title;
        $this->constructHead();
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setDescription($description){
        $this->description = $description;
        $this->constructHead();
    }
    
    private function constructHead(){
        $this->content = $this->utils->searchInc('head');
        $this->content = str_replace('{%title%}', $this->title, $this->content);
        $this->content = str_replace('{%description%}', $this->description, $this->content);
    }
}