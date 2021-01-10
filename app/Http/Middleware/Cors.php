<?php
namespace App\Http\Middleware;

use Closure;

class Cors {
    /**
     * Cors Middleware
     *
     * Handle an incoming request and add relevant CORS headers
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $headers = [
            'Access-Control-Allow-Methods' => join(', ', config('cors.allowedMethods')),
            'Access-Control-Allow-Headers' => join(', ', config('cors.allowedHeaders')),
        ];

        if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], config('cors.allowedOrigins')))
            $headers['Access-Control-Allow-Origin'] = $_SERVER['HTTP_ORIGIN'];

        if ($request->isMethod('OPTIONS'))
            return response()->json(null, 204, $headers);

        $response = $next($request);

        foreach($headers as $key => $value)
            $response->headers->set($key, $value);

        return $response;
    }
}
