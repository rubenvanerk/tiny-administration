<?php namespace WRvE\TinyAdministration\Updates;

use Winter\Storm\Auth\Models\User;
use Winter\Storm\Database\Updates\Migration;

class TruncateUsersTable extends Migration
{
    public function up()
    {
    }

    public function down()
    {
        User::truncate();
    }
}
