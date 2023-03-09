<?php

namespace App\Http\Middleware;

use Blocktrail\CryptoJSAES\CryptoJSAES;
use Closure;
use Illuminate\Http\Request;

class encryption
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
        try {
            /* GET RESPONSE DATA */
            $response = $next($request);

            $response_data = $response->getData();

            /* ENCRYPT DATA */
            if ($response_data) {

                $enc_key = env("ENCRYPTION_KEY");
                $encrypted_data = CryptoJSAES::encrypt(json_encode($response_data, JSON_UNESCAPED_UNICODE), $enc_key);

                /* RESTRUCTURED THE RASPONSE DATA */
                $encrypted_response_data = array(
                    'response_data' => $encrypted_data,
                    'main_data' => $response_data,
                );
                $response->setData($encrypted_response_data);
                return $response;
            } else {
                return $next($request);
            }
        } catch (\Exception $ex) {
            return $next($request);
        }
    }
}
