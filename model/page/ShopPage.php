<?php 
require_once "./service/Utils.php";
require_once "./view/AbstractView.php";

class ShopPage extends AbstractView {
    
    private string $article;
    
    private array $products;
    
    public function __construct()
    {
        parent::__construct();
        $this->body = $this->utils->searchHtml('shop');
        $this->article = '';
        $this->products = [];
    }
    
    
    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }
    
    /**
     * @param string $article
     */
    public function setArticle(string $article)
    {
        $this->article = $article;
    }
    
    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }
    
    /**
     * @param array $products
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
        $this->constructShop();
    }
    
    
    private function constructShop(): void
    {
        
        foreach($this->products as $product){
            $page = $this->utils->searchInc('shopArticle');
            $page = str_replace('{% title %}', $product->getName(), $page);
            $page = str_replace('{% image %}', $product->getUrlPicture(), $page);
            $page = str_replace('{% description %}', $product->getDescription(), $page);
            $page = str_replace('{% id %}', $product->getId(), $page);
            $this->article .= $page;
        }
        
        $this->body = str_replace('{% article %}', $this->article, $this->body);
        $this->constructPage();
    }
}