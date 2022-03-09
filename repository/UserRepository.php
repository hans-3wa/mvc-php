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
    
    public function fetchLogin($email, $password): array 
    {
        $data = null;
        try {
            $query = $this->connexion->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
            if ($query) {
                $query->bindParam(':email', $email);
                $query->bindParam(':password', $password);
                $query->execute();
                
                $data = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            die($e);
        }
        
        return $data;
    }
}