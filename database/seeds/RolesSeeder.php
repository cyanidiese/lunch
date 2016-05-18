<?php

use Illuminate\Database\Seeder;

use App\Models\Roles;

class RolesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin' => 'Admin',
            'master' => 'Master',
            'provider' => 'Provider',
        ];
        foreach($roles as $slug => $title) {
            $role = new Roles();
            $role->name = $title;
            $role->slug = $slug;
            $role->save();
        }

    }

}
