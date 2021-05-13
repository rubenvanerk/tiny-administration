<?php namespace WRvE\TinyAdministration\Controllers;

use Backend\Behaviors\RelationController;
use Backend\Classes\Controller;
use BackendMenu;
use Backend\Behaviors\ListController;
use Backend\Behaviors\FormController;

class Locations extends Controller
{
    public $implement = [ListController::class, FormController::class, RelationController::class];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = ['wrve.tinyadministration.access_locations'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('WRvE.TinyAdministration', 'administration', 'locations');
    }
}
