<?php

namespace App\Http\Controllers\Factories;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\AuthService;

class DishesController extends Controller
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
    public function getDishes(Request $request)
    {
        $user = $this->auth->getUser();
        $dishes = $user->dishes()->get();
        $result = [];
        foreach($dishes as $dish){
            $result[] = [
                'id' => $dish->id,
                'name' => $dish->getLocalizedName($user->locale),
                'description' => $dish->getLocalizedDescription($user->locale),
                'category_id' => $dish->category_id,
                'calories' => $dish->calories,
                'weight' => $dish->weight,
                'cost' => $dish->cost,
                'is_active' => $dish->is_active,
                'imageBig' => ($dish->image)
                    ? 'https://ucarecdn.com/'.$dish->image.'/-/scale_crop/850x480/'
                    : asset_url('/assets/img/empty_pic_full.jpg'),
                'imageSmall' => ($dish->image)
                    ? 'https://ucarecdn.com/'.$dish->image.'/-/scale_crop/269x269/'
                    : asset_url('/assets/img/empty_pic_thumbnail.jpg'),
            ];
        }
        return response($result);
    }


}
