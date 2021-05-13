<?php namespace WRvE\TinyAdministration\Models;

use Carbon\Carbon;
use Model;
use ValidationException;
use Winter\Storm\Database\Traits\SoftDelete;
use Winter\Storm\Database\Traits\Validation;
use Winter\User\Models\User;

/**
 * Model
 */
class Person extends Model
{
    use Validation;
    use SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'wrve_tinyadministration_people';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'location_id' => ['nullable', 'exists:wrve_tinyadministration_locations,id'],
    ];

    public $belongsTo = [
        'user' => User::class,
        'hometown' => [
            Location::class,
            'key' => 'location_id',
        ],
    ];

    public $belongsToMany = [
        'preferred_locations' => [
            Location::class,
            'table' => 'wrve_tinyadministration_location_person',
        ],
    ];

    public function beforeValidate()
    {
        if (!$this->user->name) {
            throw new ValidationException(['user[name]' => 'Voornaam is verplicht']);
        }

        if (!$this->user->name) {
            throw new ValidationException(['user[surname]' => 'Achternaam is verplicht']);
        }

        if (!$this->user->name) {
            throw new ValidationException(['user[email]' => 'E-mailadres is verplicht']);
        }
    }

    public function beforeSave()
    {
        if ($this->is_donor && !strtotime($this->donor_since)) {
            $this->donor_since = Carbon::now();
        } else {
            $this->donor_since = null;
        }
        unset($this->is_donor);
    }

    public function filterFields($fields, $context = null)
    {
        if (strtotime($this->donor_since) !== false) {
            $fields->is_donor->value = true;
        }
    }
}
