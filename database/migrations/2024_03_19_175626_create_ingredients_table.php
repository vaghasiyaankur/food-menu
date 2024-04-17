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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->enum('added_by', ['admin', 'manager'])->default('manager');
            $table->enum('type', ['1', '2', '3'])->default('1');
            $table->float('price')->default(0);
            $table->unsignedBigInteger('added_by_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        

        // Add foreign key for admins
        Schema::table('ingredients', function (Blueprint $table) {
            $table->foreign('added_by_id')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->where('added_by', '=', 'admin')
                    ->name('ingredient_added_by_admin_foreign');
        });

        // Add foreign key for users
        Schema::table('ingredients', function (Blueprint $table) {
            $table->foreign('added_by_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->where('added_by', '=', 'manager')
                    ->name('ingredient_added_by_manager_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
};
