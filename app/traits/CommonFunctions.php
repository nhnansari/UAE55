<?php

namespace App\traits;

use Illuminate\Support\Facades\Auth;

trait CommonFunctions
{

     public function user(){
        return Auth::guard($this->activeGuard())->user() ?: null;
    }

     public function getUserId(){
        return $this->user()->id ?: null;
    }

     private function activeGuard(){

        foreach(array_keys(config('auth.guards')) as $guard){

            if(auth()->guard($guard)->check()) return $guard;

        }
        return null;
    }
}
