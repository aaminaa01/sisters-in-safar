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
        Schema::create('unchecked_park_reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('park_id');
            $table->longText('comments')->nullable();
            $table->float('safety');
            $table->float('maintenance');
            $table->float('family_friendliness');
            $table->float('overall_rating');

            $table->foreign('park_id')->references('id')->on('parks');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unchecked_park_reviews');
    }
};
