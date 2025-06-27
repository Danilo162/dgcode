<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained('galleries')->onDelete('cascade');
            $table->json('title')->nullable(); // {fr, en, ar}
            $table->json('description')->nullable(); // {fr, en, ar}
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_url');
            $table->enum('file_type', ['image', 'video', 'document', 'audio']);
            $table->string('mime_type');
            $table->unsignedBigInteger('file_size'); // bytes
            $table->string('dimensions')->nullable(); // width x height
            $table->unsignedInteger('duration')->nullable(); // seconds pour vidéos/audio
            $table->json('alt_text')->nullable(); // {fr, en, ar}
            $table->string('photographer_name')->nullable();
            $table->string('copyright_info')->nullable();
            $table->timestamp('taken_at')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->unsignedBigInteger('download_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['file_type', 'gallery_id']);
            $table->index(['is_featured', 'gallery_id']);
            $table->index(['sort_order', 'gallery_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_files');
    }
};
