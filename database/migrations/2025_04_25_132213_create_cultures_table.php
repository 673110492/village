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
        Schema::create('cultures', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('origine')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->date('date_celebration')->nullable();
            $table->string('lieu_celebration')->nullable();
            $table->string('image')->nullable(); 
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultures');
    }
};
