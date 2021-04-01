<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Session;

class CheckCurrentCompAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('company') && (Session::get('company')['id'] == $request->route('id'))){
            return $next($request);
        }
        else {
            return redirect('/')->withErrors(['Нет прав']);
        }
    }
}
