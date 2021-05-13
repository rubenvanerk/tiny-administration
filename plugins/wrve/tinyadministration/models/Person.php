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

    protected $dates = ['deleted_at', 'donor_since'];

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

    protected $fillable = ['donor_since'];

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

    public function beforeValidate(): void
    {
        if ($this->user && !$this->user->name) {
            throw new ValidationException(['user[name]' => 'Voornaam is verplicht']);
        }

        if ($this->user && !$this->user->name) {
            throw new ValidationException(['user[surname]' => 'Achternaam is verplicht']);
        }

        if ($this->user && !$this->user->name) {
            throw new ValidationException(['user[email]' => 'E-mailadres is verplicht']);
        }
    }

    public function beforeSave(): void
    {
        if (!strtotime($this->donor_since)) {
            if ($this->is_donor && !strtotime($this->donor_since)) {
                $this->donor_since = Carbon::now();
            } else {
                $this->donor_since = null;
            }
        }
        unset($this->is_donor);
    }

    public function filterFields($fields, $context = null): void
    {
        if (strtotime($this->donor_since) !== false) {
            $fields->is_donor->value = true;
        }
    }

    public function scopeHometownTree($query, $locationIds): void
    {
        $query->whereHas('hometown', function ($query) use ($locationIds) {
            $query->whereIn('id', $locationIds)
                ->orWhereHas('parent', function ($query) use ($locationIds) {
                    $query->whereIn('id', $locationIds);
                });
        });
    }
}
