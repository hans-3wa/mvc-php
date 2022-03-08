<?php
abstract class AbstractRepository
{
    
    private const SERVER = "db.3wa.io";
    private const USER = "pierrewaflart";
    private const PASSWORD = "e467267a12d92bcc8e7b8e37f626676b";
    private const BASE = "pierrewaflart_bakery";
    
    protected $table;
    protected $connexion;
    protected $query;

    public function __construct(string $table)
    {
        $this->constructConnexion();
        $this->table = $table;
    }
    
    protected function fetch(){
        $data = null;
        try {
            $resultat = $this->connexion->query('SELECT * FROM '.$this->table);
            if ($resultat) {
                $data = $resultat->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            die($e);
        }
        
        return $data;
    }
    
    
    private function constructConnexion(){
        
        try {
            
            $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->connexion->exec("SET CHARACTER SET utf8");
    }
}