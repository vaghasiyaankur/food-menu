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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->string('code')->nullable();
            $table->string('discount_type')->default('fixed');
            $table->float('discount_value')->nullable();
            $table->timestamp('starting_date_time')->nullable();
            $table->timestamp('expiry_date_time')->nullable();
            $table->enum('added_by', ['admin', 'manager'])->default('manager');
            $table->unsignedBigInteger('added_by_id')->unsigned();
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
        Schema::dropIfExists('coupons');
    }
};
