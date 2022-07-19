<?php
namespace App\Model\Page;

use App\Service\AbstractPage;

class DefaultPage extends AbstractPage {
    
    private string $html;
    
    private array $errors;
    
    private array $data;
    
    private string $csrf;
    
    
    public function __construct(string $html)
    {
        parent::__construct();
        $this->setJavascript('ajax');
        $this->html = $html;
        $this->body = $this->utils->searchHtml($html);
    }
    
    
    public function getErrors(): array
    {
        return $this->errors;
    }
    
    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }
    
    public function getCsrf(): string
    {
        return $this->csrf;
    }
    
    public function setCsrf($csrf): void
    {
        $this->csrf = $csrf;
    }
    
    
    public function assemblerPage(): void 
    {
        switch($this->html){
            case 'index' : 
                $this->constructPage();
                break;
                
            case 'login':
                $this->setFooter();
                
                $email = $this->errors['email'] ?? "";
                $message  = $this->errors['message'] ?? "";
                $csrf = $this->csrf ?? "";
                
                $this->body = str_replace('{% email %}', $email, $this->body);
                $this->body = str_replace('{% messageError %}', $message, $this->body);
                $this->body = str_replace('{% csrf %}', $csrf, $this->body);
                
                $this->constructPage();
                break;
            
            case 'register':
                $this->setFooter();
                $this->constructPage();
                break;
                
            case 'account':
                $this->setFooter();
                $this->constructPage();
                break;
        
            default: 
                echo "error";
                break;
        }
    }
    
    
}