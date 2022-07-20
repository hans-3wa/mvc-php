<?php

namespace App\View;

use App\Model\Entity\User;
use App\Model\Page\AccountPage;
use App\Model\Page\DefaultPage;

class UserView {
    
    /**
     * @params User $user
     * return string
     */
    public function displayAccount(User $user): string
    {
        $page = new AccountPage("account");
        $page->setUser($user);
        $page->generateBody();
        $page->assemblerPage();
        return $page->getPage();
    }
}