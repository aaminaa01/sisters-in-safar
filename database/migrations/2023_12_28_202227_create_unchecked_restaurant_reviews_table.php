<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unchecked_restaurant_reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();   
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->longText('comments')->nullable();
            $table->float('safety');
            $table->float('hygiene');
            $table->float('ambiance');
            $table->float('staff_behaviour');

            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unchecked_restaurant_reviews');
    }
};
