<?php

class FormValidator
{
    public function filterSpecialCharacters($str) 
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $str);
    }

    public function isEmpty($str)
    {
        return trim($str) == '';
    }

    public function isNullOrUndefined($str)
    {
        return !isset($str);
    }

    public function isNumber($x) 
    {
        return is_numeric($x);
    }

    public function isValidEmail($email)
    {
        $email = trim($email);
        if($email  == '') return false;
        if(!strpos($email, '@')) return false;
        return true;
    }

    public function validSelection($value, $validValues) 
    {
        return in_array($value, $validValues);
    }

    public function strLengthCheck($min, $max, $str)
    {
        $strLen = strlen($str);
        if($strLen < $min) return false;
        if($strLen > $max) return false;
        return true;
    }
}

?>