<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Permissions\Relations;
use App\Traits\Models\Permissions\Properties;
use App\Traits\Models\Permissions\Attributes;
use App\Traits\Models\Permissions\Getters;

class Permissions extends Model
{

    use Relations, Properties, Attributes, Getters;

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
    protected $table = 'permissions';

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
