<?php namespace WRvE\TinyAdministration\Models;

use Model;
use October\Rain\Database\Traits\SimpleTree;
use Winter\Storm\Database\Traits\SoftDelete;
use Winter\Storm\Database\Traits\Validation;

/**
 * Model
 */
class Location extends Model
{
    use Validation;
    use SoftDelete;
    use SimpleTree;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'wrve_tinyadministration_locations';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => ['required', 'max:191'],
    ];

    public $fillable = ['name', 'parent_id'];

    public $hasMany = [
        'citizens' => [Person::class],
    ];

    public $belongsToMany = [
        'people' => [
            Person::class,
            'table' => 'wrve_tinyadministration_location_person',
        ],
    ];
}
