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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->enum('added_by', ['admin', 'manager'])->default('manager');
            $table->unsignedBigInteger('added_by_id')->unsigned();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('sub_categories');
    }
};
