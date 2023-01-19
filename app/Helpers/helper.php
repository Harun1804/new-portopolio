<?php

use Illuminate\Support\Facades\Route;

if(!function_exists('breadcrumb')){
    function breadcrumb()
    {
        $routes = Route::current()->uri();
        $splitRoute = explode('/',$routes);

        return $splitRoute;
    }
}
