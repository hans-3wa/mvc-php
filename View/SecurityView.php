<?php
namespace App\View;

use App\Model\Page\DefaultPage;
use Exception;

class SecurityView {

    /**
     * @return string
     * @throws Exception
     */
    public function displayLogin(array $errors): string
    {
        $page = new DefaultPage("login");
        $page->setErrors($errors);

        $_SESSION['csrf'] = bin2hex(random_bytes(15));

        $page->setCsrf($_SESSION['csrf']);
        $page->assemblerPage();

        return $page->getPage();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function displayRegister(array $errors): string
    {
        $page = new DefaultPage("register");
        $page->setErrors($errors);

        $_SESSION['csrf'] = bin2hex(random_bytes(15));

        $page->setCsrf($_SESSION['csrf']);
        $page->assemblerPage();

        return $page->getPage();
    }
}