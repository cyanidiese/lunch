<?php

use Illuminate\Database\Seeder;

use App\Models\Users;
use App\Models\Roles;

use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '123123';
        $admin_role = Roles::where('slug', 'admin')->first();
        $master_role = Roles::where('slug', 'master')->first();
        $provider_role = Roles::where('slug', 'provider')->first();

        $faker = Faker::create();


        $user = new Users();
        $user->email = 'admin@test.com';
        $user->first_name = $faker->firstName;
        $user->last_name = $faker->lastName;
        $user->password = $password;
        $user->save();
        $user->roles()->attach($admin_role->id);


        $user = new Users();
        $user->email = 'master@test.com';
        $user->first_name = $faker->firstName;
        $user->last_name = $faker->lastName;
        $user->password = $password;
        $user->save();
        $user->roles()->attach($master_role->id);


        $user = new Users();
        $user->email = 'provider@test.com';
        $user->first_name = $faker->firstName;
        $user->last_name = $faker->lastName;
        $user->password = $password;
        $user->deadline = $faker->time();
        $user->save();
        $user->roles()->attach($provider_role->id);

    }

}
