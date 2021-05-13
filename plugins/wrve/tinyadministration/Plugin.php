<?php namespace WRvE\TinyAdministration;

use Backend;
use System\Classes\PluginBase;
use WRvE\TinyAdministration\Classes\Extensions\UserExtension;
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
        factory(Person::class, 250)->create();
    }
}
