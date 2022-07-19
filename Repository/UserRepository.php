<?php 
namespace App\Repository;
use PDO;

require_once "./Repository/AbstractRepository.php";

class UserRepository extends AbstractRepository {
    
    private const TABLE = "users";
    
    public function __construct(){
        parent::__construct(self::TABLE);
    }
    
    public function fetchUsers(){
        $data = $this->fetch();
        var_dump($data);
    }
    
    public function fetchLogin($email)
    {
        $data = null;
        try {
            $query = $this->connexion->prepare('SELECT * FROM users WHERE email = :email');
            if ($query) {
                $query->bindParam(':email', $email);
                $query->execute();
                
                $data = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (\Exception $e) {
            die($e);
        }
        
        return $data;
    }
    
    public function insertUser($user): bool
    {
        try {
            $query = $this->connexion->prepare('INSERT INTO users (name, first_name, email, password, roles, created_at) 
                                                VALUES (:name, :firstName, :email, :password, :roles, NOW() )');
            if ($query) {
                $query->bindValue(':name', $user->getName());
                $query->bindValue(':firstName', $user->getFirstName());
                $query->bindValue(':email', $user->getEmail());
                $query->bindValue(':password', $user->getPassword());
                $query->bindValue(':roles', $user->getRole());
                
                return $query->execute();
            }
        } catch (Exception $e) {
            return false;
        }
    }
}