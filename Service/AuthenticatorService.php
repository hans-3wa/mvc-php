<?php
namespace App\Service;

use App\Model\Entity\User;

class AuthenticatorService {

    private ?User $user;

    public function __construct(){

        $this->user = $this->authUser();
    }

    public function authUser(): ?User
    {
        if(!isset($_SESSION['user'])){
            return null;
        }

        return unserialize($_SESSION['user']);
    }

    public function authAdmin(): ?User
    {
        if(!$this->isAdmin()){
            return null;
        }

        return $this->authUser();
    }

    public function isAdmin(): bool
    {
        if($this->user && $this->user->getRole() === 'admin')
            return true;
        else
            return false;

    }

    public function restrictedPageUser(): void
    {
        if ($this->authUser() === null) {
            header('location: ./index.php?url=login');
            exit;
        }
    }
}