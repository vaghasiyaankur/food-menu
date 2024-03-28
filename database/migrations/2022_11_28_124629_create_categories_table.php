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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->enum('added_by', ['admin', 'manager'])->default('manager');
            $table->unsignedBigInteger('added_by_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        // Add foreign key for admins
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('added_by_id')
                  ->references('id')
                  ->on('admins')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
                  ->where('added_by', '=', 'admin')
                  ->name('categories_added_by_admin_foreign');
        });

        // Add foreign key for users
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('added_by_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade')
                  ->where('added_by', '=', 'manager')
                  ->name('categories_added_by_manager_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
