<?php namespace WRvE\TinyAdministration\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateWrveTinyadministrationLocations extends Migration
{
    public function up()
    {
        Schema::create('wrve_tinyadministration_locations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('name');
            $table->integer('parent_id')->nullable()->unsigned()->index();
        });

        Schema::create('wrve_tinyadministration_location_person', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('location_id')->unsigned()->index();
            $table->integer('person_id')->unsigned()->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wrve_tinyadministration_locations');
    }
}
