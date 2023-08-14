<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('user_email')){
    function user_email(){
        return Auth::user()->email . ".vn";
    }
}

// tính % độ dài số lượng trong dashboard 
if(!function_exists('getPercent')){
    function getPercent($current_value, $array){
        $max = max($array);

        return floor(($current_value/$max)*100);
    }
}