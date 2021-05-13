<?php namespace WRvE\TinyAdministration\Models;

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
    ];

    public $belongsTo = ['user' => User::class];

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
}
