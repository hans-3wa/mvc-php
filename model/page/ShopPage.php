<?php 
require_once "./service/Utils.php";

class ShopPage {
    
    
    private string $page;
    
    private string $article;
    
    private array $products;
    
    private Utils $utils;
    
    public function __construct()
    {
        $this->utils = new Utils();
        $this->page = $this->utils->searchHtml('shop');
        $this->article = '';
        $this->products = [];
        $this->constructShop();
    }
    
    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->page;
    }
    
    /**
     * @param string $page
     */
    public function setContent(string $page)
    {
        $this->page = $page;
        $this->constructHead();
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
        $this->constructHead();
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
        $this->page = $this->utils->searchHtml('shop');
        
        foreach($this->products as $product){
            $page = $this->utils->searchInc('shopArticle');
            $page = str_replace('{% title %}', $product->getName(), $page);
            $page = str_replace('{% image %}', $product->getUrlPicture(), $page);
            $page = str_replace('{% description %}', $product->getDescription(), $page);
            $this->article .= $page;
        }
        $this->page = str_replace('{% article %}', $this->article, $this->page);
    }
}