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
        Schema::create('kot_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kot_id')->nullable();
            $table->foreign('kot_id')->references('id')->on('kots')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->float('quantity')->default(0);
            $table->text('note')->nullable();
            $table->float('price')->default(0);
            $table->float('extra_amount')->default(0);
            $table->float('total_price')->default(0);
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
        Schema::dropIfExists('kot_products');
    }
};
