<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class Wmt_Login_Controller extends Controller
{
    
    // public function username(){
    //     return 'name';
    // }
    
    public function index(){
        return view('login', [
            'title' => 'Wings Group'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/transactions');
        }
        return back()->with('LoginError', 'Login Failed!');
    }

}
