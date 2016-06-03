<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Models\Categories;
use App\Models\Dishes;
use App\Models\Favorites;
use App\Models\Items;
use App\Models\Menus;
use App\Models\PasswordResets;
use App\Models\Permissions;
use App\Models\Roles;
use App\Models\RolesPermissions;
use App\Models\Users;
use App\Models\UsersPermissions;
use App\Models\UsersRoles;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $categories,
        $dishes,
        $favorites,
        $items,
        $menus,
        $password_resets,
        $permissions,
        $roles,
        $roles_permissions,
        $users,
        $users_permissions,
        $users_roles;

    /**
     * Create a new instance
     */
    public function __construct()
    {
        //Models
        $this->categories                     = new Categories;
        $this->dishes                         = new Dishes;
        $this->favorites                      = new Favorites;
        $this->items                          = new Items;
        $this->menus                          = new Menus;
        $this->password_resets                = new PasswordResets;
        $this->roles                          = new Roles;
        $this->permissions                    = new Permissions;
        $this->users                          = new Users;
        $this->roles_permissions              = new RolesPermissions;
        $this->users_roles                    = new UsersRoles;
        $this->users_permissions              = new UsersPermissions;
    }
}
