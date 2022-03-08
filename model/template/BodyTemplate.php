<?php 
class BodyTemplate {
    
    
    private string $content;
    
    public function __construct(){
        
    }
    
    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
    
    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }
}