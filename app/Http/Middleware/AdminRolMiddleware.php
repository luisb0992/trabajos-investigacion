<?php

namespace App\Http\Middleware;

use App\Enum\UserRolEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRolMiddleware
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

        // verificar si el usuario tiene el rol de admin
        if ($user->isAdmin()) {
            return $next($request);
        }

        // redireccion a la página anterior
        return redirect()->route('dashboard')->with('error_msj', 'No tiene permitido ver dicho contenido');
    }
}
