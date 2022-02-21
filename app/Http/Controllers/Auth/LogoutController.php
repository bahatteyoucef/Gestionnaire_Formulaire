<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout_user()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
