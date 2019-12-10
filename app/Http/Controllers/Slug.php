<?php

namespace App\Http\Controllers;

class Slug {

    public static function slug($string, $separator = '-') {
        $re = "/(\\s|\\".$separator.")+/mu";
        $str = @trim($string);
        $subst = $separator;
        $result = preg_replace($re, $subst, $str);
        
        $result = mb_strtolower($result);
        $result = str_replace("'", '', $result);
        $result = str_replace("/-", '', $result);
        $result = str_replace("\\-", '', $result);
        $result = str_replace('"', '', $result);
        $result = str_replace('‘', '', $result);
        $result = str_replace('’', '', $result);
        $result = str_replace(',', '', $result);
        $result = str_replace('.', '', $result);
        $result = str_replace('?', '', $result);
        $result = str_replace('!', '', $result);
        $result = str_replace('@', '', $result);
        // $result = str_replace('�ে', '', $result);
        
        return $result;
    }
}