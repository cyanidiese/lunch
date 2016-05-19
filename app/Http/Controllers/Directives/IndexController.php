<?php

namespace App\Http\Controllers\Directives;

use App\Http\Controllers\Controller;

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
    public function pagination(Request $request)
    {

        return view('templates.directives.pagination');
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function menu(Request $request)
    {

        return view('templates.directives.menu');
    }

}
