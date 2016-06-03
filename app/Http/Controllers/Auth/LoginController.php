<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\Auth\LoginRequest;

use App\Services\AuthService;

class LoginController extends Controller
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
        return view('templates.auth.login.index');
    }

    /**
     * @param LoginRequest $request
     *
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        $_email    = strval($request->input('email'));
        $_password = strval($request->input('password'));

        if($this->auth->login($_email, $_password))
        {
            return redirect()->route('home');
        }

        return redirect()->back()
                         ->withInput()
                         ->withErrors("An error has occurred.");
    }

}
