<?php 
require_once "./service/Utils.php";
require_once "./view/AbstractView.php";

class DefaultPage extends AbstractView {
    
    private string $html;
    
    private string $titleHead;
    
    
    public function __construct(string $html)
    {
        parent::__construct();
        
        $this->html = $html ?? '';
        $this->body = $this->utils->searchHtml($html);
        $this->assemblerPage();
    }
    
    public function assemblerPage(): void 
    {
        switch($this->html){
            case 'index' : 
                $this->constructPage();
                break;
                
            case 'account':
                $this->head->setTitle('Mon profil');
                $this->setHeader();
                $this->setFooter();
                $this->constructPage();
                break;
                
            case 'login':
                $this->setFooter();
                $this->constructPage();
                break;
        
            default: 
                echo "error";
                break;
        }
    }
    
    
}