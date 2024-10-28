<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use \Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Arr;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $locale = Session::get('locale') ?? 'ar';
        Session::put('locale', $locale);
        App::setlocale($locale);

        return $next($request);
    }
}
