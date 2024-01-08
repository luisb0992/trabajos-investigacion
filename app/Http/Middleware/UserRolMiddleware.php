<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // obtener el usuario
        $user = $request->user();

        // verificar si el usuario tiene el rol de user
        if ($user->isUser()) {
            return $next($request);
        }

        // redireccion a la página anterior
        return redirect()->back()->with('error', 'No tienes permiso para acceder a este contenido');
    }
}
