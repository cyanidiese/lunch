<?php

use Illuminate\Database\Seeder;

use App\Models\Dishes;
use App\Models\Categories;
use App\Models\Users;

use Faker\Factory as Faker;

class DishesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Categories::all();
        $users = Users::all();
        $providers = [];
        foreach($users as $user){
            if($user->is('provider')){
                $providers[] = $user;
            }
        }

        $faker_en = Faker::create('en_US');
        $faker_uk = Faker::create('uk_UA');
        $faker_ru = Faker::create('ru_RU');

        for($i = 0; $i < rand(10, 20); $i++) {
            $dish = new Dishes();
            $dish->category_id = $categories->random()->id;
            $dish->provider_id = $faker_en->randomElement($providers)->id;
            $dish->calories = $faker_en->numberBetween(100, 9000);
            $dish->weight = $faker_en->numberBetween(100, 9000);
            $dish->cost = $faker_en->numberBetween(10, 11111);
            $dish->name_en = $faker_en->sentence(rand(1,5));
            $dish->name_uk = $faker_uk->sentence(rand(1,5));
            $dish->name_ru = $faker_ru->sentence(rand(1,5));
            $dish->description_en = $faker_en->sentence(rand(10,40));
            $dish->description_uk = $faker_uk->sentence(rand(10,40));
            $dish->description_ru = $faker_ru->sentence(rand(10,40));

            if($i % 5 == 0){
                $dish->image = 'a32a53d2-31e3-49c4-9adc-40bbfa90b2b2';
            }

            $dish->save();
        }

    }

}
