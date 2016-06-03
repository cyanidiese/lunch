<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\UsersRoles\Relations;
use App\Traits\Models\UsersRoles\Properties;
use App\Traits\Models\UsersRoles\Setters;
use App\Traits\Models\UsersRoles\Getters;

class UsersRoles extends Model
{

    use Relations, Properties, Setters, Getters;

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
    protected $table = 'users_roles';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

}
