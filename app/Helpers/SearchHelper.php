<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Http\Request;

class SearchHelper
{
    public static function mark(string $string,$field = 'q' )
    {


       $input = mb_strtolower(request()->q);
       if(!$input){
           return $string;
       }

       $newString = mb_strtolower($string);
       if (strpos($newString,$input) !== false ){
           $html = preg_replace("#($input)#i",
               "<span class='finded'>$1</span>",$string);
       } else{
           $html = $string;
       }

       return $html;
    }
}