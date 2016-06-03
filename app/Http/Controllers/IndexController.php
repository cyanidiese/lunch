<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\AuthService;

class IndexController extends Controller
{

    /**
     * @var object
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
        $user = $this->auth->getUser();

        if($user->is('admin'))
        {
            return redirect()->route('admin');
        }

        if($user->is('master'))
        {
            return redirect()->route('master');
        }

        if($user->is('provider'))
        {
            return redirect()->route('provider');
        }

        return redirect()->route('login');
    }

}
