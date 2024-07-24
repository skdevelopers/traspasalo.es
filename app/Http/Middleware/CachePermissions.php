<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CachePermissions
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        //dd($user);
        if ($user) {
            $permissions = Cache::remember('permissions_for_user_' . $user->id, now()->addMinutes(10), function () use ($user) {
                return $user->role->permissions->pluck('name')->toArray();
            });
           //  dd($permissions);
            $user->permissions = $permissions;
        }

        return $next($request);
    }
}
