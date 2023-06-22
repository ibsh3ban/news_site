<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint\morphs;



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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile')->unique();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->date('date');
            $table->enum('status',['active','inactive']);
            $table->enum('gender',['male','female']);
            $table->foreignId('city_id');
            $table->foreign('city_id')->on('cities')->references('id')->cascadeOnDelete();
            $table->morphs('actor');
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
