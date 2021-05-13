<?php namespace WRvE\TinyAdministration\Classes\Extensions;

use Winter\User\Models\User;
use WRvE\TinyAdministration\Models\Person;

trait UserExtension
{
    protected function extendUserModel(): void
    {
        User::extend(function ($userModel) {
            $userModel->hasOne['person'] = [Person::class];
        });
    }
}
