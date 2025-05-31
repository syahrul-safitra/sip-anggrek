<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // check auth apakah dua dua nya belum login, jika belum lempar ke login : 
        if (!Auth::guard('admin')->check() && !Auth::guard('parent')) {
            return redirect('/login');
        }
        
        if (!Auth::guard('admin')->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
