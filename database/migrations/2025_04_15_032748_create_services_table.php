<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        

        // Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        // Projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        // About sections
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('contenu')->nullable();
            $table->timestamps();
        });

        Schema::create('about_section_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_section_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        // Partners
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });

        // Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('contenu');
            $table->timestamps();
        });

        Schema::create('testimonial_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('testimonial_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        // Contacts
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });

        // Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('logo')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->nullable();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Blog Posts
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('contenu')->unique();
            $table->string('cover_image')->nullable();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('title');
            $table->longText('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_translations');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('testimonial_translations');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('about_section_translations');
        Schema::dropIfExists('about_sections');
        Schema::dropIfExists('project_translations');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('service_translations');
        Schema::dropIfExists('services');
    }
};
