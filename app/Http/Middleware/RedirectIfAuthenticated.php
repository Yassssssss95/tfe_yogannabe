<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Si c'est un admin
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                // Pour les utilisateurs normaux
                return redirect('/');
            }
        }

        return $next($request);
    }
}