<?php

namespace App\Http\Controllers\Provider\Views;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\AuthService;

class MenusController extends Controller
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
    public function lists(Request $request)
    {
        return view('templates.provider.menus.list');
    }

}
