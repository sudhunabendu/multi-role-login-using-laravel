<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CheckApiHeader
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
        $headerInfo = getallheaders();

        // dd($headerInfo['Apikey']);
        if (!isset($headerInfo['Apikey'])) {
            return Response::json(array('message' => 'Unauthenticated'), 401);
        }
        if ($headerInfo['Apikey'] != config('app.api_key')) {
            return Response::json(array('message' => 'Unauthenticated'), 401);
        }
        return $next($request);
    }
}
