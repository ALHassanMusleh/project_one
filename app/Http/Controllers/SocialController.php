<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service)   //$service نستخدمها للكل facebook and youtube ...
    {
        return  Socialite::driver($service)->redirect(); //Socialite الي موجدودة في config/app
    }

    public function callback($service) // عشان يرجع على الموقع وهوه معاه البيانات ويحفظهن
    {
       return $user = Socialite::with($service)-> user();

    }
}
