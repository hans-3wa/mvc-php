<?php
namespace App\View;

use App\Service\Utils;

abstract class AbstractView {


    private Utils $utils;


    public function __construct(){
        $this->utils = new Utils();
    }

    public function display400(string $message = ""){
        $page = $this->utils->searchHtml('400');
        $page = str_replace('{% message %}', $message, $page);
        return $page;
    }
}