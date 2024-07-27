<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LockScreen
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && session('lock-screen')) {
            return redirect()->route('lock-screen');
        }

        return $next($request);
    }
}
