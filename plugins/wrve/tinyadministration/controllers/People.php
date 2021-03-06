<?php namespace WRvE\TinyAdministration\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Backend\Behaviors\ListController;
use Backend\Behaviors\FormController;
use Str;
use Winter\User\Models\User;
use WRvE\TinyAdministration\Models\Person;

class People extends Controller
{
    public $implement = [ListController::class, FormController::class];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['wrve.tinyadministration.access_people'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('WRvE.TinyAdministration', 'administration', 'people');
    }

    public function index()
    {
        parent::index();
        $this->vars['people'] = $people = Person::all();
        $this->vars['newPeopleThisPeriod'] = $people->filter(function ($person) {
            return $person->created_at >= now()->subMonth();
        })->count();
        $this->vars['newPeoplePreviousPeriod'] = $people->filter(function ($person) {
            return $person->created_at < now()->subMonth() && $person->created_at > now()->subMonths(2);
        })->count();
        $this->vars['newDonorsThisPeriod'] = $people->filter(function ($person) {
            return $person->donor_since >= now()->subMonth();
        })->count();
        $this->vars['newDonorsPreviousPeriod'] = $people->filter(function ($person) {
            return $person->donor_since < now()->subMonth() && $person->donor_since > now()->subMonths(2);
        })->count();
    }

    public function formExtendModel($model)
    {
        if (!$model->user && $this->formGetContext() === 'create') {
            $model->user = new User();
            $model->user->is_activated = true;
            $model->user->password = $model->user->password_confirmation = Str::random(User::getMinPasswordLength());
        }

        return $model;
    }

    public function listExtendQuery($query)
    {
        $query->with('user', 'hometown');
    }
}
