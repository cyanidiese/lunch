<?php

namespace App\Http\Controllers\Factories;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\AuthService;

class CategoriesController extends Controller
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
    public function getCategories(Request $request)
    {
        $user = $this->auth->getUser();
        $categories = $this->categories->all();
        $result = [];
        foreach($categories as $category){
            $result[] = [
                'id' => $category->id,
                'name' => $category->getLocalizedName($user->locale),
            ];
        }
        return response($result);
    }


}
