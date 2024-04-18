<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class LocaleConverter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(session()->has('locale')){
        //   App::setLocale(session()->get('locale'));
        // }
        App::setLocale($request->segment(1));
        URL::defaults(['locale' => $request->segment(1)]);
        return $next($request);
    }
}
