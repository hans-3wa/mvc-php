<?php 
namespace App\Model\Entity;

class Product {
    
    private int $id;
    
    private string $name;
    
    private int $quantity;
    
    private int $price;
    
    private string $urlPicture;
    
    private string $description;
    
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    
    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @param int $Price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * @return string
     */
    public function getUrlPicture()
    {
        return $this->urlPicture;
    }
    
    /**
     * @param int $urlPicture
     */
    public function setUrlPicture($urlPicture)
    {
        $this->urlPicture = $urlPicture;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param int $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
}