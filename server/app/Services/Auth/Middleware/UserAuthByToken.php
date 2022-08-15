<?php

namespace App\Services\Auth\Middleware;

use App\Services\Auth\HttpUserAuthenticationService;
use Closure;
use Illuminate\Http\Request;

class UserAuthByToken
{

    private $authenticationService;

    public function __construct(HttpUserAuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }
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
            $this->authenticationService->attempt();
        } catch (\Exception $e) {
            return response(['error' => $e->getMessage(), $e->getCode()]);
        }

        return $next($request);
    }
}
