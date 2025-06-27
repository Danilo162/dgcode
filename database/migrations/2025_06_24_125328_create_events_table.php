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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // {fr, en, ar}
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->json('description'); // {fr, en, ar}
            $table->json('content'); // {fr, en, ar}
            $table->json('agenda')->nullable(); // {fr, en, ar}
            $table->enum('type', ['conference', 'workshop', 'seminar', 'meeting', 'ceremony', 'fundraising'])->default('conference');
            $table->enum('format', ['physical', 'virtual', 'hybrid'])->default('physical');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('timezone', 50)->default('UTC');
            $table->json('location')->nullable(); // {fr, en, ar}
            $table->string('venue_name')->nullable();
            $table->string('venue_address')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('region_id')->nullable()->constrained('regions');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('access_code')->nullable();
            $table->unsignedInteger('max_participants')->nullable();
            $table->boolean('registration_required')->default(false);
            $table->datetime('registration_deadline')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('currency', 3)->default('EUR');
            $table->foreignId('organizer_id')->nullable()->constrained('users');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->enum('status', ['draft', 'published', 'registration_open', 'registration_closed', 'ongoing', 'completed', 'cancelled'])->default('draft');
            $table->string('featured_image_url')->nullable();
            $table->string('gallery_folder')->nullable();
            $table->string('livestream_url')->nullable();
            $table->string('recording_url')->nullable();
            $table->string('materials_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_public')->default(true);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['status', 'start_date']);
            $table->index(['type', 'status']);
            $table->index(['country_id', 'status']);
            $table->index(['is_public', 'status']);
            $table->index(['format', 'status']);
            $table->index(['registration_deadline']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
