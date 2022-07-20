<?php 
namespace App\Controller;

use App\Model\Entity\User;
use App\Service\AuthenticatorService;
use App\Service\Validator;
use App\View\UserView;

class UserController {
    
   private UserView $view;

    private AuthenticatorService $auth;

    private ?User $user;

    public function __construct()
    {
        $this->view = new UserView();
        $this->auth = new AuthenticatorService();
        $this->auth->restrictedPageUser();
        $this->user = $this->auth->authUser();
    }

    public function account(): void
    {
        echo $this->view->displayAccount($this->user);
    }

    public function updateAccount(): void
    {
        $validator = new Validator();
        $forms = [
            ['type' => 'text', 'value' => $_POST['lastName']],
            ['type' => 'text', 'value' => $_POST['firstName']]
        ];
        $validator = new Validator();
        $verify = $validator->validateForm($forms);

        var_dump($verify); die();

        $this->user->setName($_POST['lastName']);
        $this->user->setFirstName($_POST['firstName']);
        $data = $this->repository->updateUser($this->user);
        var_dump($data); die();
        header('location: ./index.php?url=account');
    }
}