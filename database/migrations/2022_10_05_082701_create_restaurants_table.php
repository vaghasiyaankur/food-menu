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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->string('logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->text('operating_start_hours')->nullable();
            $table->text('operating_end_hours')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('request_status')->default(2)->comment("1 => Approved, 2 => Pending, 0 => Declined");
            $table->string('restaurant_code')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
};
