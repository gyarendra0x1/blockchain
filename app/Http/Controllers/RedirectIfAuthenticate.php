<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectIfAuthenticate extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/products'; // Replace '/dashboard' with the URL you want to redirect to.
}
