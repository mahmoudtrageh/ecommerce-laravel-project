<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeLang
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
        if (session()->has('lang')){
            $lang = session('lang');
            app()->setLocale($lang);
        }
        
        if(!session()->has('lang'))
        {
            session()->put('lang', 'ar');
        }

        return $next($request);
    }

}
