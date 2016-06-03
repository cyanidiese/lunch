<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Roles\Relations;
use App\Traits\Models\Roles\Scopes;
use App\Traits\Models\Roles\Properties;
use App\Traits\Models\Roles\Attributes;
use App\Traits\Models\Roles\Getters;

class Roles extends Model
{

    use Relations, Scopes, Properties, Attributes, Getters;

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
    protected $table = 'roles';

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
