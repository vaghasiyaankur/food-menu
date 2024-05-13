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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('table_id')->unsigned()->nullable();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->unsignedBigInteger('restaurant_id')->unsigned()->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->integer('person')->default(0);
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('locality')->nullable();
            $table->text('note')->nullable();
            $table->integer('waiter_id')->nullable();
            $table->string('role')->default('Guest');
            $table->string('cancelled_by')->nullable();
            $table->integer('finish_time')->nullable();
            $table->boolean('finished')->default(0);
            $table->boolean('is_serve')->default(0);
            $table->float('total_price')->default(0);
            $table->float('discount_amount')->default(0);
            $table->string('discount_type')->default('fixed');
            $table->float('payable_amount')->default(0);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
