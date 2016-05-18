<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Menus\Relations;
use App\Traits\Models\Menus\Scopes;
use App\Traits\Models\Menus\Properties;
use App\Traits\Models\Menus\Attributes;
use App\Traits\Models\Menus\Getters;

class Menus extends Model
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
    protected $table = 'menus';

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
