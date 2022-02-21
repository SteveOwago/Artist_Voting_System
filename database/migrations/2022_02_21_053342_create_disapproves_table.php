<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisapprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disapproves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reason_title')->nullable();
            $table->longText('reason')->nullable();
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id', 'artist_fk_5659809')->references('id')->on('users');
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
        Schema::dropIfExists('disapproves');
    }
}
