<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogAuthController extends Controller
{
    public function index()
    {
       auth()->logout();
       return redirect()->route('login');
    }
}
