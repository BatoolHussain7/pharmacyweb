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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('pharmacist_name');
            $table->string('email');
            $table->string('password');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->integer("profit")->default(0);
            $table->integer("total_medicine")->default(0);
            $table->string('img')->nullable();
            $table->time('close_time')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('phone')->nullable();

            // $table->unsignedBigInteger('month_profits_id');
            // $table->foreign('month_profits_id')
            //     ->references('id')
            //     ->on('month_profits')
            //     ->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
