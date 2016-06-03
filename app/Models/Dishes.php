<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Dishes\Relations;
use App\Traits\Models\Dishes\Scopes;
use App\Traits\Models\Dishes\Properties;
use App\Traits\Models\Dishes\Attributes;
use App\Traits\Models\Dishes\Getters;

class Dishes extends Model
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
    protected $table = 'dishes';

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
