<?php

use Illuminate\Database\Seeder;

use App\Models\Menus;
use App\Models\Users;
use App\Models\Items;

use Faker\Factory as Faker;

class ItemsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menus::all();

        $faker = Faker::create();

        foreach($menus as $menu) {

            $dishes = Users::find($menu->provider_id)->dishes()->get();

            $dishes_in_menu = [];

            for ($i = 0; $i < count($dishes) - rand(1, count($dishes)/3); $i++) {

                $dish_id =  $dishes->random()->id;

                if (!in_array($dish_id, $dishes_in_menu)) {

                    $item = new Items();
                    $item->menu_id = $menu->id;
                    $item->dish_id = $dish_id;
                    $item->save();

                    $dishes_in_menu[] = $dish_id;

                }
            }
        }

    }

}
