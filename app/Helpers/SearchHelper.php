<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Http\Request;

class SearchHelper
{
    public static function mark(string $string,$field = 'q' )
    {


       $input = mb_strtolower(request()->q);
       $newString = mb_strtolower($string);
       if ($input == $newString){
           $html = '';
           $html .="<span class='finded'>";
           $html .=$string;
           $html .="</span>";
       } else{
           $html = $string;
       }

       return $html;
    }
}