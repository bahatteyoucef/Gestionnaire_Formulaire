<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Formulaire;
use App\Models\Evaluation;

class MobileController extends Controller
{
    public function index()
    {
        $formulaires    =   Formulaire::all();
        $evaluation     =   Evaluation::inRandomOrder()->first();
        
        return view("Mobile.index") ->with("user"       ,   Auth::user())
                                    ->with("formulaires",   $formulaires)
                                    ->with("evaluation" ,   $evaluation);
    }
}
