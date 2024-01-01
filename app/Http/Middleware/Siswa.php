<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Siswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role != 'Siswa' && $request->user()->role != 'KepalaSekolah') {
            return redirect('/');
        }
        return $next($request);
    }
}
