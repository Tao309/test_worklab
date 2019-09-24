<?php

namespace App\Http\Middleware;

use App\Traits\ApiReponse;
use Closure;

class ApiAuthentification
{
    use ApiReponse;

    const API_KEY = 'header-api-key';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header(self::API_KEY);

        if($token ===  null || $token !== config('services.api.token'))
        {
            return $this->sendError('Unauthorized', 401);
        }

        return $next($request);
    }
}
