<?php namespace WRvE\TinyAdministration;

use System\Classes\PluginBase;
use WRvE\TinyAdministration\Classes\Extensions\UserExtension;
use WRvE\TinyAdministration\Models\Location;
use WRvE\TinyAdministration\Models\Person;

class Plugin extends PluginBase
{
    use UserExtension;

    public function boot()
    {
        $this->extendUserModel();
    }

    public function registerSeeder()
    {
        factory(Person::class, 250)
            ->create()
            ->each(function ($person) {
                $locations = Location::inRandomOrder()->limit(random_int(0, 5))->get();
                foreach ($locations as $location) {
                    $person->preferred_locations()->add($location);
                }
            });
    }
}
