<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->bigIncrements('tableid');
            $table->string('msisdn')->nullable();
            $table->string('name')->nullable();
            $table->string('region')->nullable();
            $table->string('idno')->nullable();
            $table->string('participant_type')->nullable();
            $table->string('termsandcondition')->default('0')->nullable();
            $table->string('registration_no')->nullable();
            $table->timestampTz('datecreated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration');
    }
}
