<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\AuthService;

class LogoutController extends Controller
{

    /**
     * @var AuthService
     */
    private $auth;

    /**
     * Create a new instance.
     *
     * @param AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        parent::__construct();

        // Services
        $this->auth = $auth;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auth->logout();

        return redirect()->route('login');
    }

}
