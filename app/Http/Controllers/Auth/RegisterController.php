<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function index () {
        return view('auth.registrar');
    }

    public function store (Request $request) {
        
        #HELPER que permite eliminar espacios de un input
        #Se modifica el $request para que despues de validar que el registro no esta duplicado en la db (desde la migracion)
        $request->request->add(['username' => Str::slug($request->username)]);
        
        #Validar condiciones de los input del formulario de registro 
        $validateData=$request->validate([
            'name'=>'required|min:5',
            'username'=>'required|unique:users|min:8|max:10',
            'email'=>'required|unique:users|email|max:30',
            'password'=>'required|min:8|same:password_confirm',
            'password_confirm'=>'required',
        ]);
        

        #Ingreso de los registros a la base de datos
        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);

        #Autenticar si un usuario enta registrado o no
        auth()->attempt([
            'email'=> $request->email,
            'password' => $request->password
        ]);

        #Otra forma de hacer autenticaciones de usuario
        //auth()->attempt($request->only('email,password'));

        //Redireccionar a una pagina despues de realizar el registro
        return redirect()->route('post.index');

    }
}