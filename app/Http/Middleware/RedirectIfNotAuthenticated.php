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
            // Si el usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        return $next($request);
    }
}
