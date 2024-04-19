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
        Schema::create('combo_restaurant_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('combo_id')->nullable();
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');
            $table->unsignedBigInteger('restaurant_language_id')->nullable();
            $table->foreign('restaurant_language_id')->references('id')->on('restaurant_languages')->onDelete('cascade');
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
        Schema::dropIfExists('combo_restaurant_languages');
    }
};
