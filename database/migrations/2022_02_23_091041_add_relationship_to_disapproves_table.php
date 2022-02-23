<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToDisapprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disapproves', function (Blueprint $table) {
            $table->unsignedBigInteger('action_by');
            $table->foreign('action_by', 'action_fk_5609809')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disapproves', function (Blueprint $table) {
            //
        });
    }
}
