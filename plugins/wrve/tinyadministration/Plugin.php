<?php namespace WRvE\TinyAdministration;

use Backend;
use System\Classes\PluginBase;
use WRvE\TinyAdministration\Classes\Extensions\UserExtension;

class Plugin extends PluginBase
{
    use UserExtension;

    public function boot()
    {
        $this->extendUserModel();
    }
}
