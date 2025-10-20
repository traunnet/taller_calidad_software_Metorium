<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SimulatedAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('admin_logged', false)) {
            // si no está logueado, redirige a login con mensaje
            return redirect()->route('login')->with('error', 'Debes iniciar sesión (simulado) para acceder al dashboard.');
        }

        return $next($request);
    }
}
