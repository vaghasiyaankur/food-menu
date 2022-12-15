<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->String('restaurant_name')->nullable();
            $table->String('phone_number')->nullable();
            $table->String('manager_name')->nullable();
            $table->String('restaurant_logo')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->boolean('close_reservation')->default(0);
            $table->integer('member_capacity')->nullable();
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
};
