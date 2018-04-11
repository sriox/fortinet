<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivityTableForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            /*$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('activity_type_id')->references('id')->on('activity_types');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->foreign('se_id')->references('id')->on('ses');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            /*$table->dropForeign(['user_id']);
            $table->dropForeign(['activity_type_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['technology_id']);
            $table->dropForeign(['se_id']);*/
        });
    }
}
