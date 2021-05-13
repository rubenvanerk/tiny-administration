<?php namespace WRvE\TinyAdministration;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TinyAdministration',
            'description' => 'System to keep track of people that are interested in living in a tiny house',
            'author'      => 'WRvE',
            'icon'        => 'icon-home'
        ];
    }
}
