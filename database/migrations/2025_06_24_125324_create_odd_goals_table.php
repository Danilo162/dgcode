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
        Schema::create('odd_goals', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number')->unique(); // 1-17
            $table->json('title'); // {fr, en, ar}
            $table->json('description'); // {fr, en, ar}
            $table->string('icon_url')->nullable();
            $table->string('color_code', 7)->nullable(); // hex color (#RRGGBB)
            $table->string('official_url')->nullable();
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['number', 'is_active']);
            $table->index(['sort_order', 'is_active']);
            $table->index(['is_active', 'deleted_at']);

            // Foreign keys (ajoutées après création des tables users)
            // $table->foreign('created_by')->references('id')->on('users');
            // $table->foreign('updated_by')->references('id')->on('users');
            // $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odd_goals');
    }
};
