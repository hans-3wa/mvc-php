<?php
namespace App\Model\Entity;

class User {

    private int $id;
    
    private string $name;
    
    private string $firstName;
    
    private string $email;
    
    private string $password;
    
    private string $role;
    
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @param int $id 
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name 
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param string $firstName 
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param string $email 
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    
    /**
     * @param string $password 
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }
    
    /**
     * @param string $role 
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}