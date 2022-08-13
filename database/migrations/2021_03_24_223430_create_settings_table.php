<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable(); 
            $table->string('logo')->nullable(); 
            $table->string('favicon')->nullable(); 
            $table->string('phone_one')->nullable(); 
            $table->string('phone_two')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('name')->nullable(); 
            $table->string('address')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('twitter')->nullable(); 
            $table->string('linkedin')->nullable(); 
            $table->string('instagram')->nullable(); 
            $table->string('youtube')->nullable(); 
            $table->string('github')->nullable(); 
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
        Schema::dropIfExists('settings');
    }
}
