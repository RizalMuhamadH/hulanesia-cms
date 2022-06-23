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

if(! function_exists('epoch')){
    function epoch($unix){
        $date = Carbon\Carbon::parse(((int)$unix/1000))->timezone(config('app.timezone'));
        return $date;
    }
}