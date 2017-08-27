<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTypeDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_type__departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_type_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->timestamps();

            $table->foreign('activity_type_id')->references('id')->on('activity_types');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_type__departments');
    }
}
