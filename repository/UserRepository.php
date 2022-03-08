<?php 

require_once "./repository/AbstractRepository.php";

class UserRepository extends AbstractRepository {
    
    private const TABLE = "users";
    
    public function __construct(){
        parent::__construct(self::TABLE);
    }
    
    public function fetchUsers(){
        $data = $this->fetch();
        var_dump($data);
    }
}