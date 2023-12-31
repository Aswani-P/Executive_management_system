<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype=='executive')
            {
                return view('dashboard');
            }
            
            else if($usertype=='admin')
            {
                return view('admin.adminHome');
                
            }
        }
    }
}
