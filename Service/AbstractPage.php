<?php

namespace App\Service;

use App\Model\Page\HeadTemplate;

abstract class AbstractPage
{

    private string $page;

    public HeadTemplate $head;

    protected string $header;

    protected string $body;

    protected string $footer;

    protected $javascript;

    protected Utils $utils;

    private AuthenticatorService $auth;

    public function __construct()
    {
        $this->utils = new Utils();
        $this->auth = new AuthenticatorService();
        $this->page = '';
        $this->head = new HeadTemplate();
        $this->header = $this->utils->searchInc('header');
        $this->footer = $this->utils->searchInc('footer');
    }

    /**
     * @return bool|string
     */
    public function getHeader(): bool|string
    {
        $logout = $this->auth->authUser() ? '<li><a href="./index.php?url=logout">Déconnexion</a></li>' : '';
        $this->header = str_replace('{% logout %}', $logout, $this->header);

        return $this->header;
    }


    protected function setHeader($header = false): void
    {
        $this->header = $header ? $this->utils->searchInc($header) : "";
    }

    protected function setFooter($footer = false): void
    {
        $this->footer = $footer ? $this->utils->searchInc($footer) : "";
    }

    protected function setJavascript(string $script): void
    {
        $this->javascript .= $script ? "<script type='text/javascript'>" . $this->utils->searchScript($script) . "</script>" : '';
    }

    public function getPage(): string
    {
        return $this->page;
    }


    public function constructPage(): void
    {
        $this->page .= $this->head->getContent();
        $this->page .= $this->getHeader();
        $this->page .= $this->body;
        $this->page .= $this->footer;
        $this->page .= $this->javascript;
    }
}