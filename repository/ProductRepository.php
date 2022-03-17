<?php 

require_once "./repository/AbstractRepository.php";

class ProductRepository extends AbstractRepository {
    
    private const TABLE = "products";
    
    public function __construct(){
        parent::__construct(self::TABLE);
    }
    
    public function fetchId(int $id)
    {
        $data = null;
        try {
            $query = $this->connexion->prepare('SELECT * FROM products WHERE id = :id');
            if ($query) {
                $query->bindParam(':id', $id);
                $query->execute();
                
                $data = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            die($e);
        }
        
        return $data;
    }

}