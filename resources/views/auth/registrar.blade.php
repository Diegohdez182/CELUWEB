@extends('layouts.app')

@section('titulo')
    REGISTRA TU USUARIO
@endsection

@section('contenido')

    <div class="md:flex md:justify-center">
        <div class="md:w-4/12 bg-white pd-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST">
            @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" class="border p-3 w-full rounded-lg  @error('name') border-red-500 @enderror"
                        value="{{old('name')}}">
                </div>
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                    id="username" 
                    name="username" 
                    type="text" 
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{old('username')}}">
                </div>

                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror

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

                <div class="mb-5">
                    <label for="password_confirm" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password validation
                    </label>
                    <input 
                        id="password_confirm" 
                        name="password_confirm" 
                        type="password" 
                        class="border p-3 w-full rounded-lg  @error('password_confirm') border-red-500 @enderror">
                </div>

                @error('password_confirm')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror

            <input type="submit" value="crear cuenta" class="bg-sky-700 hover:bg-sky-700 transitio-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-r-lg">
            </form>
        </div>
      
    </div>

@endsection