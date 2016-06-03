<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Categories\Relations;
use App\Traits\Models\Categories\Scopes;
use App\Traits\Models\Categories\Properties;
use App\Traits\Models\Categories\Attributes;
use App\Traits\Models\Categories\Getters;

class Categories extends Model
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
    protected $table = 'categories';

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
