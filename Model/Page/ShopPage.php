<?php
namespace App\Model\Page;

use App\Service\AbstractPage;


class ShopPage extends AbstractPage {
    
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
    }
    
    
    public function constructShop(): void
    {
        // Avec Pagination
        // // si &Page=1
        // $Page = $_GET['Page'] ?? 0; // si pas de &Page met par défault 0

        // $pagination = new Pagination($this->products, 3);
        // $pagination->setCurrent($Page);

        // foreach($pagination->getDatasetByPage() as $product){
            
        //     $Page = $this->utils->searchInc('shopArticle');
        //     $Page = str_replace('{% title %}', $product->getName(), $Page);
        //     $Page = str_replace('{% image %}', $product->getUrlPicture(), $Page);
        //     $Page = str_replace('{% description %}', $product->getDescription(), $Page);
        //     $Page = str_replace('{% id %}', $product->getId(), $Page);
        //     $this->article .= $Page;
        // }
        
        foreach($this->products as $product){
            $content = $this->utils->searchInc('shopArticle');
            $content = str_replace('{% title %}', $product->getName(), $content);
            $content = str_replace('{% image %}', $product->getUrlPicture(), $content);
            $content = str_replace('{% description %}', $product->getDescription(), $content);
            $content = str_replace('{% id %}', $product->getId(), $content);
            $this->article .= $content;
        }
        
        $this->body = str_replace('{% article %}', $this->article, $this->body);
        //$this->body = str_replace('{% pagination %}', $pagination->getLinks("?url=shop") , $this->body);
        
        
        $this->constructPage();
    }
}