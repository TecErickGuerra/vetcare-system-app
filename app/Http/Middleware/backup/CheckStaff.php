<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckStaff
{
    public function handle(Request $request, Closure $next): Response
    {
        // TEMPORAL: Permitir acceso a todos los usuarios autenticados
        if (Auth::check()) {
            return $next($request);
        }
        
        return redirect()->route('login');
    }
}