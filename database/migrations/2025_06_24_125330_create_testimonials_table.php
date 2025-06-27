<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('position')->nullable(); // {fr, en, ar}
            $table->string('organization')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->json('content'); // {fr, en, ar}
            $table->unsignedTinyInteger('rating')->nullable(); // 1-5
            $table->string('photo_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('entity_type')->nullable(); // project, training, event, organization
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['entity_type', 'entity_id']);
            $table->index(['status', 'is_approved']);
            $table->index(['is_featured', 'status']);
            $table->index(['country_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
