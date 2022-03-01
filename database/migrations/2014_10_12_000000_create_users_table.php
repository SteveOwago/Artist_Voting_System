<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('id_number')->unique();
            $table->string('role_id')->default('2');
            $table->string('is_approved')->default(0);
            $table->string('profile')->default('default.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('activity_id')->default(1);
            $table->unsignedBigInteger('phase_id')->default(1);
            $table->foreign('phase_id', 'phase_fk_56989')->references('id')->on('phases');
            $table->unsignedBigInteger('region_id')->default(1);
            $table->foreign('region_id', 'region_fk_56989')->references('id')->on('regions');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
