<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('post.index');
        }
        
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validateData=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('mensaje','credenciales incorrectas');
        }

        return redirect()->route('post.index');
    }
}
