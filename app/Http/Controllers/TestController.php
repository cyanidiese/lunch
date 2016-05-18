<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\AuthService;

use Faker\Factory as Faker;

use App\Models\Categories;
use App\Models\Users;


class TestController extends Controller
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
        $dishes = Users::find(2)->dishes()->get();

        return response($dishes);
    }

}