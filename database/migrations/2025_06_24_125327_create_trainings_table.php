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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // {fr, en, ar}
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->json('description'); // {fr, en, ar}
            $table->json('content'); // {fr, en, ar}
            $table->json('objectives')->nullable(); // {fr, en, ar}
            $table->json('prerequisites')->nullable(); // {fr, en, ar}
            $table->json('curriculum')->nullable(); // {fr, en, ar}
            $table->enum('type', ['online', 'offline', 'hybrid'])->default('offline');
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->unsignedInteger('duration_hours')->nullable();
            $table->unsignedInteger('max_participants')->nullable();
            $table->unsignedInteger('min_participants')->default(1);
            $table->decimal('price', 8, 2)->default(0);
            $table->string('currency', 3)->default('EUR');
            $table->enum('language', ['fr', 'en', 'ar', 'multilingual'])->default('fr');
            $table->datetime('start_date');
            $table->datetime('end_date')->nullable();
            $table->datetime('registration_deadline')->nullable();
            $table->json('location')->nullable(); // {fr, en, ar}
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('region_id')->nullable()->constrained('regions');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('materials_url')->nullable();
            $table->string('certificate_template')->nullable();
            $table->foreignId('trainer_id')->nullable()->constrained('users');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->enum('status', ['draft', 'published', 'registration_open', 'registration_closed', 'ongoing', 'completed', 'cancelled'])->default('draft');
            $table->string('featured_image_url')->nullable();
            $table->string('gallery_folder')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['status', 'start_date']);
            $table->index(['type', 'status']);
            $table->index(['country_id', 'status']);
            $table->index(['level', 'status']);
            $table->index(['registration_deadline']);
            $table->index(['trainer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
