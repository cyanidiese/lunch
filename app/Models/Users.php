<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\HasRoleAndPermission;
use App\Traits\Models\Users\Relations;
use App\Traits\Models\Users\Scopes;
use App\Traits\Models\Users\Properties;
use App\Traits\Models\Users\Attributes;
use App\Traits\Models\Users\Setters;
use App\Traits\Models\Users\Getters;
use App\Traits\Models\Users\Counters;

class Users extends Authenticatable implements HasRoleAndPermissionContract
{

    use SoftDeletes, HasRoleAndPermission, Relations, Scopes, Properties, Attributes, Setters, Getters, Counters;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'lunch';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Create a new instance.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable($this->getConnection()->getDatabaseName() . '.' . $this->getTable());
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        self::deleting(function($user)
        {
            $user->nb_id  = null;
            $user->status = 0;

            $user->save();
        });
    }

}
