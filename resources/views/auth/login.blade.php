@extends('layouts.app')

@section('titulo')
    INGRESA TU USUARIO
@endsection

@section('contenido')

    <div class="md:flex md:justify-center">
        
        <div class="md:w-4/12 bg-white pd-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}">
            
                @csrf

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    class="border p-3 w-full rounded-lg  @error('email') border-red-500 @enderror"
                    value="{{old('email')}}">
                </div>

                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        class="border p-3 w-full rounded-lg  @error('password') border-red-500 @enderror">
                </div>

                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror

                @if (session('mensaje'))                
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{session('mensaje')}}
                    </p>              
                @endif


            <input type="submit" value="login" class="bg-sky-700 hover:bg-sky-700 transitio-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-r-lg">
            </form>
        </div>
      
    </div>

@endsection