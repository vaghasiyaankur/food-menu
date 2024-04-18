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
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->text('image');
            $table->boolean('food_type')->default(1);
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->enum('added_by', ['admin', 'manager'])->default('manager');
            $table->unsignedBigInteger('added_by_id')->unsigned();
            $table->timestamps();
        });

        // Add foreign key for admins
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('added_by_id')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->where('added_by', '=', 'admin')
                    ->name('sub_categories_added_by_admin_foreign');
        });

        // Add foreign key for users
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('added_by_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->where('added_by', '=', 'manager')
                    ->name('sub_categories_added_by_manager_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos');
    }
};
