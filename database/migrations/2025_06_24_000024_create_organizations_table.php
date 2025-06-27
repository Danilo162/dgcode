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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // {fr, en, ar}
            $table->string('slug')->unique();
            $table->string('acronym', 20)->nullable(); // GDD, ONU, etc.
            $table->string('legal_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->json('mission')->nullable(); // {fr, en, ar}
            $table->json('vision')->nullable(); // {fr, en, ar}
            $table->json('objectives')->nullable(); // {fr, en, ar}
            $table->json('target_audience')->nullable(); // {fr, en, ar}
            $table->json('description')->nullable(); // {fr, en, ar}
            $table->date('founded_date')->nullable();
            $table->string('website_url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('address')->nullable(); // {fr, en, ar}
         //   $table->foreignId('country_id')->nullable()->constrained('countries');
         //   $table->foreignId('region_id')->nullable()->constrained('regions');
          //  $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('logo_url')->nullable();
            $table->string('cover_image_url')->nullable();
            $table->string('api_endpoint')->nullable();
           // $table->string('api_key')->nullable();
            $table->enum('type', ['main', 'partner', 'donor', 'beneficiary'])->default('partner');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->boolean('is_verified')->default(false);
          //  $table->unsignedInteger('employee_count')->nullable();
            $table->decimal('annual_budget', 15, 2)->nullable();
            $table->json('social_media')->nullable(); // {facebook, twitter, linkedin, instagram, youtube}
            $table->json('certifications')->nullable(); // array
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['type', 'status']);
          //  $table->index(['country_id', 'status']);
            $table->index(['is_verified', 'status']);
            $table->index(['status', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
