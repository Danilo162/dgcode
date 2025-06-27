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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // {fr, en, ar}
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->json('description'); // {fr, en, ar}
            $table->json('content'); // {fr, en, ar}
            $table->json('objectives')->nullable(); // {fr, en, ar}
            $table->json('methodology')->nullable(); // {fr, en, ar}
            $table->json('expected_results')->nullable(); // {fr, en, ar}
            $table->enum('status', ['planned', 'ongoing', 'completed', 'suspended', 'cancelled'])->default('planned');
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('actual_start_date')->nullable();
            $table->date('actual_end_date')->nullable();
            $table->decimal('budget_total', 15, 2)->nullable();
            $table->decimal('budget_allocated', 15, 2)->nullable();
            $table->decimal('budget_spent', 15, 2)->nullable();
            $table->string('currency', 3)->default('EUR');
            $table->json('funding_sources')->nullable(); // array
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->foreignId('region_id')->nullable()->constrained('regions');
          // $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->json('specific_location')->nullable(); // {fr, en, ar}
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('radius_km', 8, 2)->nullable(); // zone d'intervention
            $table->unsignedInteger('beneficiaries_target')->nullable();
            $table->unsignedInteger('beneficiaries_reached')->nullable();
            $table->json('impact_metrics')->nullable();
            $table->string('featured_image_url')->nullable();
            $table->string('gallery_folder')->nullable();
            $table->string('documents_folder')->nullable();
           // $table->foreignId('project_manager_id')->nullable()->constrained('users');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['status', 'is_published']);
            $table->index(['country_id', 'status']);
            $table->index(['is_featured', 'is_published']);
            $table->index(['category_id', 'status']);
            $table->index(['start_date', 'end_date']);
           // $table->index(['project_manager_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
