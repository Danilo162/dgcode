<?php

// Migration: create_permissions_table.php
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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom lisible de la permission
            $table->string('slug')->unique(); // Slug unique (ex: users.create)
            $table->string('module'); // Module concerné (users, projects, etc.)
            $table->string('action'); // Action (create, read, update, delete, etc.)
            $table->json('description')->nullable(); // Description multilingue
            $table->boolean('is_system')->default(false); // Permission système non modifiable

            // Timestamps et audit
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['module', 'action']);
            $table->index(['slug']);
            $table->index(['is_system']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
