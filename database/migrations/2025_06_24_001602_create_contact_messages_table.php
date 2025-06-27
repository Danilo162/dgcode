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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('position')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->enum('message_type', [
                'general_inquiry',
                'partnership_request',
                'donation_inquiry',
                'volunteer_application',
                'media_request',
                'complaint',
                'suggestion',
                'technical_support'
            ])->default('general_inquiry');
            $table->json('subject'); // {fr, en, ar}
            $table->json('message'); // {fr, en, ar}
            $table->enum('preferred_language', ['fr', 'en', 'ar'])->default('fr');
            $table->enum('preferred_contact_method', ['email', 'phone', 'whatsapp', 'video_call'])->default('email');
            $table->enum('urgency', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->json('attachments')->nullable(); // array of file URLs
            $table->boolean('newsletter_subscription')->default(false);
            $table->boolean('gdpr_consent')->default(false);

            // Gestion du message
            $table->enum('status', ['new', 'read', 'in_progress', 'resolved', 'closed', 'archived'])->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->json('internal_notes')->nullable(); // {fr, en, ar} - notes internes
            $table->json('response')->nullable(); // {fr, en, ar}
            $table->timestamp('first_read_at')->nullable();
            $table->timestamp('responded_at')->nullable();
            $table->foreignId('responded_by')->nullable()->constrained('users');
            $table->timestamp('resolved_at')->nullable();
            $table->foreignId('resolved_by')->nullable()->constrained('users');

            // Métriques
            $table->unsignedInteger('response_time_hours')->nullable(); // temps de première réponse
            $table->unsignedInteger('resolution_time_hours')->nullable(); // temps de résolution
            $table->unsignedTinyInteger('satisfaction_rating')->nullable(); // 1-5
            $table->text('satisfaction_feedback')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['status', 'priority']);
            $table->index(['message_type', 'status']);
            $table->index(['assigned_to', 'status']);
            $table->index(['email', 'created_at']);
            $table->index(['urgency', 'status']);
            $table->index(['country_id', 'message_type']);
            $table->index(['created_at', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
