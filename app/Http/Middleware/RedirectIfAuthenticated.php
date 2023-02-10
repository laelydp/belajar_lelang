<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                if(Auth::user()->level == 'admin')
                    return redirect()->route('admin.dashboard');
                else if (Auth::user()->level == 'petugas')
                    return redirect()->route('petugas.dashboard');
                else if (Auth::user()->level == 'masyarakat')
                    return redirect()->route('masyarakat.dashboard');
                return redirect(RouteServiceProvider::HOME);
                }
            }

        return $next($request);
    }
}
