<?php
namespace App\Service;
class Utils {
    
    public function searchHtml($filename){
        return file_get_contents('./template/'. $filename . '.html');
    }
    
    public function searchInc($filename){
        return file_get_contents('./template/inc/_'. $filename . '.html');
    }
    
    public function searchScript($script){
        return file_get_contents('./public/assets/js/'. $script . '.js');
    }
}