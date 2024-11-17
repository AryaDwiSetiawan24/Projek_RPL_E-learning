<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Periksa usertype dan arahkan ke dashboard sesuai role
        if ($user->usertype == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->usertype == 'guru') {
            return redirect()->route('guru.dashboard');
        } elseif ($user->usertype == 'siswa') {
            return redirect()->route('siswa.dashboard');
        }

        return $next($request);
    }
}
