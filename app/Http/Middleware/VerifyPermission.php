<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Closure;

use App\Exceptions\PermissionDeniedException;

class VerifyPermission
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
     * @param int|string $permission
     *
     * @return mixed
     *
     * @throws PermissionDeniedException
     */
    public function handle($request, Closure $next, $permission)
    {
        if($this->auth->check() && $this->auth->user()->can($permission))
        {
            return $next($request);
        }

        throw new PermissionDeniedException($permission);
    }

}
