<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function gethome(){
        return view('backend/index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('login');
    }      
    
}
