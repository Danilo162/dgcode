<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // {fr, en, ar}
            $table->json('description')->nullable(); // {fr, en, ar}
            $table->enum('type', ['photo', 'video', 'mixed'])->default('photo');
            $table->string('entity_type'); // project, event, article, training, organization
            $table->unsignedBigInteger('entity_id');
            $table->string('cover_image_url')->nullable();
            $table->boolean('is_public')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['entity_type', 'entity_id']);
            $table->index(['type', 'is_public']);
            $table->index(['is_public', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
