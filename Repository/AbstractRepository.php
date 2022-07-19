<?php
namespace App\Repository;
use PDO;

abstract class AbstractRepository
{
    
    protected $table;
    protected $connexion;
    protected $query;

    public function __construct(string $table)
    {
        $this->constructConnexion();
        $this->table = $table;
    }
    
    public function fetchAll(){
        $data = null;
        try {
            $resultat = $this->connexion->query('SELECT * FROM '.$this->table);
            if ($resultat) {
                $data = $resultat->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (\Exception $e) {
            die($e);
        }
        
        return $data;
    }
    
    
    private function constructConnexion(){
        
        try {
            $this->connexion = new PDO("mysql:host=" . $_ENV["DATABASE_HOST"] . ";dbname=" . $_ENV["DATABASE_DB_NAME"], $_ENV["DATABASE_USER"], $_ENV["DATABASE_PASSWORD"]);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            var_dump( $_ENV["DATABASE_PASSWORD"]);
            die('Erreur : ' . $e->getMessage());
        }
        $this->connexion->exec("SET CHARACTER SET utf8");
    }
}