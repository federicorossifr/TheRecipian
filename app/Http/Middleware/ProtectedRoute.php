<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
class ProtectedRoute
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
        $logCookie = $request->cookie("logged");
        $idCookie = $request->cookie("id");
        if($logCookie && $idCookie == $request->id)
            return $next($request);
        else
            return redirect("/")->withCookie(Cookie::make("error","Not authorized","1"));
    }
}
