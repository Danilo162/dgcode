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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Champs supplémentaires
            $table->string('picture')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->text('address')->nullable();

            // Préférences et paramètres
            $table->enum('language_preference', ['fr', 'en', 'ar'])->default('fr');
            $table->string('timezone')->default('Africa/Abidjan');
            $table->enum('status', ['active', 'inactive', 'suspended', 'pending'])->default('active');

            // Informations de connexion
            $table->timestamp('last_login_at')->nullable();
            $table->unsignedInteger('login_count')->default(0);
            $table->json('preferences')->nullable();

            // Champs d'audit
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Timestamps et soft deletes
            $table->timestamps();
            $table->softDeletes();

            // Index pour performance
            $table->index(['status']);
            $table->index(['language_preference']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
