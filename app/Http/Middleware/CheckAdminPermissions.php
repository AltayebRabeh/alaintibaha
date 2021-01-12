<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAdminPermissions
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
        if (Auth::guard('admin')->user()->permission == '*')
            return $next($request);

        foreach (explode(',', Auth::guard('admin')->user()->permission) as  $per) {
            if (strpos($_SERVER['REQUEST_URI'], $per)) {
                return $next($request);
                break;
            }
        }

        return redirect()->route('dashboard')->with(['message' => 'لاتملك صلاحية الوصول', 'msg-type' => 'danger']);
    }
}
