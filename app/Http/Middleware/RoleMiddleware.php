<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (!$request->user()) {
            // Belum login → redirect ke login
            return redirect()->route('login');
        }

        // Bisa menerima banyak role dipisah koma atau pipe
        $roles = is_array($roles) ? $roles : explode('|', $roles);

        foreach ($roles as $role) {
            if ($request->user()->hasRole($role)) {
                // Kalau role cocok, lanjut request
                return $next($request);
            }
        }

        // Kalau role tidak sesuai → redirect ke halaman default sesuai role
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.orders.index');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('orders.index');
        } elseif ($user->hasRole('pelaksana')) {
            return redirect()->route('pelaksana.tasks');
        }

        // Kalau user tidak punya role sama sekali → redirect ke dashboard atau login
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses yang sesuai.');
    }
}
