<?php

namespace App\Http\Middleware;

use Blocktrail\CryptoJSAES\CryptoJSAES;
use Closure;
use Illuminate\Http\Request;

class decryption
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
            /* GET REQUEST DATA */
            $request_data = $request->get('request_data');

            /* DECRYPT DATA */
            if (!empty($request_data)) {
                $enc_key = env("ENCRYPTION_KEY");
                $decrypt_data = CryptoJSAES::decrypt($request_data, $enc_key);
                $decrypt_data = !empty($decrypt_data) ? json_decode($decrypt_data, true) : '';

                /* SET REQUEST DATA */
                $decrypt_request_data = array(
                    'request_decrypt_data' => !empty($decrypt_data) ? $decrypt_data : ''
                );

                $request->request->add($decrypt_request_data);

                return $next($request);
            } else {
                return $next($request);
            }
        } catch (\Exception $ex) {
            return $next($request);
        }
    }
}
