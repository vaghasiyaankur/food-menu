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
            $table->string('restaurant_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('restaurant_logo')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->boolean('close_reservation')->default(0);
            $table->integer('member_capacity')->nullable();
            $table->boolean('highlight_on_off')->default(0);
            $table->float('highlight_time')->default(0);
            $table->string('currency_name')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->unsignedBigInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
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
