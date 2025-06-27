<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('language_preference', ['fr', 'en', 'ar'])->default('fr');
            $table->json('interests')->nullable(); // array: projects, events, trainings, news
            $table->json('organization_preferences')->nullable(); // array d'IDs d'organisations
            $table->json('odd_preferences')->nullable(); // array d'IDs d'ODD
            $table->timestamp('subscription_date')->useCurrent();
            $table->boolean('is_active')->default(true);
            $table->timestamp('unsubscribed_at')->nullable();
            $table->string('unsubscribe_reason')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->string('verification_token')->nullable();
            $table->enum('source', ['website', 'event', 'social_media', 'referral'])->default('website');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['is_active', 'email_verified']);
            $table->index(['language_preference', 'is_active']);
            $table->index(['subscription_date']);
            $table->index(['verification_token']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
    }
};
