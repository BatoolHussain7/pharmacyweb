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
        Schema::create('rate_pharmacies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->unique();
            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
            ->onDelete('cascade');

            $table->unsignedBigInteger('pharmacy_id');
            $table->foreign('pharmacy_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade');
            
            $table->integer('star_rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate_pharmacies');
    }
};
