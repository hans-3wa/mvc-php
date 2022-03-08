<?php 

require_once "./repository/AbstractRepository.php";

class ProductRepository extends AbstractRepository {
    
    private const TABLE = "products";
    
    public function __construct(){
        parent::__construct(self::TABLE);
    }

}