<?php
namespace App\Model\Page;

use App\Model\Entity\User;
use App\Service\AbstractPage;
use App\Service\AuthenticatorService;

class AccountPage extends AbstractPage {

    private string $html;

    private array $errors;


    private string $csrf;

    private User $user;



    public function __construct(string $html)
    {
        parent::__construct();
        $this->setJavascript('main');
        $this->html = $html;
    }


    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }

    public function getCsrf(): string
    {
        return $this->csrf;
    }

    public function setCsrf($csrf): void
    {
        $this->csrf = $csrf;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }


    public function assemblerPage(): void
    {
        switch($this->html){
            case 'account' :
                $this->body = str_replace('{% lastName %}', $this->user->getName(), $this->body);
                $this->body = str_replace('{% firstName %}', $this->user->getFirstName(), $this->body);
                $this->body = str_replace('{% email %}', $this->user->getEmail(), $this->body);
                $this->constructPage();
                break;
            default:
                echo "error";
                break;
        }
    }

    public function generateBody(): void
    {
        if($this->user->getRole() === 'admin'){
            $this->body = $this->utils->searchAdmin($this->html);
        } else{
            $this->body = $this->utils->searchHtml($this->html);
        }
    }
}