<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Closure;

use App\Exceptions\RoleDeniedException;

class VerifyRole
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request    $request
     * @param Closure    $next
     * @param int|string $role
     *
     * @return mixed
     *
     * @throws RoleDeniedException
     */
    public function handle($request, Closure $next, $role)
    {
        if($this->auth->check() && $this->auth->user()->is($role))
        {
            return $next($request);
        }

        throw new RoleDeniedException($role);
    }

}
