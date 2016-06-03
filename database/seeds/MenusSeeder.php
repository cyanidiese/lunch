<?php

use Illuminate\Database\Seeder;

use App\Models\Menus;
use App\Models\Users;

use Faker\Factory as Faker;

class MenusSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Users::all();
        $providers = [];
        foreach($users as $user){
            if($user->is('provider')){
                $providers[] = $user;
            }
        }

        $faker = Faker::create();

        $dates = [];

        $begin = strtotime('-2 days');
        $end = strtotime('+7 days');

        for($i = 0; $i < 10; $i++) {

            $time = rand($begin, $end);
            $date = date('Y-m-d', $time);

            if(!in_array($date, $dates)) {

                $menu = new Menus();
                $menu->provider_id = $faker->randomElement($providers)->id;
                $menu->date = $date;
                $menu->is_active = ($time > time()) ? 1 : 0;
                $menu->save();

                $dates[] = $date;

            }
        }

    }

}
