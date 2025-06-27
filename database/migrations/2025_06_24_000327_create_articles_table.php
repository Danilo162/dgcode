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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // {fr, en, ar}
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->json('excerpt'); // {fr, en, ar}
            $table->json('content'); // {fr, en, ar}
            $table->enum('type', ['news', 'blog', 'press_release', 'report', 'announcement'])->default('news');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('featured_image_url')->nullable();
            $table->string('gallery_folder')->nullable();
            $table->foreignId('author_id')->nullable()->constrained('users');
            $table->json('tags')->nullable(); // array
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_breaking_news')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedInteger('reading_time')->nullable(); // minutes
            $table->json('seo_title')->nullable(); // {fr, en, ar}
            $table->json('seo_description')->nullable(); // {fr, en, ar}
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['status', 'published_at']);
            $table->index(['type', 'status']);
            $table->index(['is_featured', 'status']);
            $table->index(['category_id', 'status']);
            $table->index(['author_id', 'status']);
            $table->index(['is_breaking_news', 'published_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
