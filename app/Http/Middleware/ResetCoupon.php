<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResetCoupon
{
    public function handle(Request $request, Closure $next)
    {
      
        $route = $request->route();
        $routeName = $route ? $route->getName() : null;

        if ($routeName !== 'cart.show') {
            Session::forget('discount');
        }

        return $next($request);
    }
}
