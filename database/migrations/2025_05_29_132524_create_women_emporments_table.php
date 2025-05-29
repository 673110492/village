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
        Schema::create('women_emporments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('edition')->nullable();
            $table->text('description')->nullable();
            $table->text('lien_youtube2')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->text('lien_youtube1')->nullable();
            $table->date('start_date')->nullable();
            $table->enum('status', ['activé', 'désactivé'])->default('activé');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('women_emporments');
    }
};