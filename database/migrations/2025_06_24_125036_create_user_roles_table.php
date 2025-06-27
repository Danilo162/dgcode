<?php

// Migration: create_user_roles_table.php (VERSION SIMPLIFIÉE)
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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');

            // Informations d'assignation
            $table->foreignId('assigned_by')->constrained('users');
            $table->timestamp('assigned_at')->useCurrent();

            // Période de validité
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);

            // Permissions spécifiques et notes
            $table->json('permissions_override')->nullable(); // permissions spécifiques
            $table->text('notes')->nullable();

            // Timestamps standards
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Contraintes et index
            $table->unique(['user_id', 'role_id'], 'unique_user_role');

            // Index pour performance
            $table->index(['user_id', 'is_active']);
            $table->index(['role_id', 'is_active']);
            $table->index(['start_date', 'end_date']);
            $table->index(['assigned_by', 'assigned_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
