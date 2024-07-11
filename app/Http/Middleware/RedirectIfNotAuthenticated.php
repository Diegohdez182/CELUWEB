<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
if (!Auth::check()) {
            # Revisa si existe una autenticacion activa, de lo contrario redirecciona al usuario
            # a la pagina del login
            return redirect()->route('login')->with('error', 'Credenciales incorrectas.');
        }

        return $next($request);
    }
}