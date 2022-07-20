<?php
namespace App\Service;

class Validator {

    public function validateEmail($data)
    {
        if($data === "")
            return false;

        $filter = filter_var(htmlspecialchars($data), FILTER_VALIDATE_EMAIL);

        if(!$filter)
            return false;

        return $filter;
    }


    public function validateInt($data): bool
    {
        $filter = filter_var(htmlspecialchars($data), FILTER_VALIDATE_INT);
        if(!$filter)
            return false;

        return $filter;
    }

    public function validateRequired($data): bool
    {
        if($data === ""){
            return false;
        }

        return true;
    }

    public function validateForm(array $array){

        $datas = [];
        $errors = [];
        foreach($array as $form){
            switch($form['type']){
                case 'text':

                    if($this->validateRequired($form['value'])){
                        $datas[] = htmlspecialchars($form['value']);
                    } else {
                        $errors[] = ['error' => "Champs requis"];
                    }
                    break;

                case 'email':

                    if($this->validateEmail($form['value'])){
                        $datas[] = htmlspecialchars($form['value']);
                    } else {
                        $errors[] = ['error' => "Email invalide"];
                    }
                    break;
            }

            if(count($errors) <= 0){
                return $datas;
            }

            return $errors;
        }
    }

}