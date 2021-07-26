<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $value = request()->input('identify');  //identifyبجيب الي نكتب في input الي اسمها

        //لو القيمة هاد ايميل خيرجعلي ايميل لو مش ايميل هتكون موبايل

        $filed = filter_var($value,FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        //هضيفها للريكويست وبيكون اراي

        request()->merge([$filed => $value]);

        return $filed;
    }
}
