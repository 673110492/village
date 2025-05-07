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
        Schema::create('culturecommentaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('culture_id')->constrained('cultures')->onDelete('cascade'); 
            $table->string('auteur')->nullable();
            $table->text('contenu');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culturecommentaires');
    }
};
