<?php
/**
 * Created by PhpStorm.
 * User: deniz.gokce
 * Date: 4.02.2018
 * Time: 02:39
 */

namespace App\Http\Middleware;


use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') === 'prod') {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}