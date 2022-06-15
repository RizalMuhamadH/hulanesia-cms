<?php

if(! function_exists('is_admin')){
    function is_admin($collection){
        return $collection->contains('name','admin');
    }
}

if(! function_exists('is_me')){
    function is_me($id){
        return auth()->user()->id == $id;
    }
}