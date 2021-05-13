<?php namespace WRvE\TinyAdministration\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateWrveTinyadministrationPeople extends Migration
{
    public function up()
    {
        Schema::create('wrve_tinyadministration_people', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('user_id')->index()->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wrve_tinyadministration_people');
    }
}
