<?php
namespace App\Service;

class Utils {
    
    public function searchHtml($filename): bool|string
    {
        return file_get_contents('./template/'. $filename . '.html');
    }
    
    public function searchAdmin($filename): bool|string
    {
        return file_get_contents('./template/admin/'. $filename . '.html');
    }

    public function searchInc($filename): bool|string
    {
        return file_get_contents('./template/inc/_'. $filename . '.html');
    }
    
    public function searchScript($script): bool|string
    {
        return file_get_contents('./public/assets/js/'. $script . '.js');
    }
}