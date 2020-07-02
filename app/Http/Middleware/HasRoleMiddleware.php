<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Role;

class HasRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = Role::get();
        if (auth()->user()->hasAnyRole($roles)) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}