<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('activity_type_id');
            $table->integer('country_id');
            $table->integer('technology_id');
            $table->integer('se_id');
            $table->date('date');
            $table->integer('quarter')->nullable();
            $table->string('smart_ticket')->nullable();
            $table->string('customer')->nullable();
            $table->string('description', 255);
            $table->string('activity_executed', 255)->nullable();
            $table->date('execution_date')->nullable();
            $table->integer('time_used')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
