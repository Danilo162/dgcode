<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['general_contact', 'join_us', 'donation_inquiry', 'partnership', 'volunteer', 'complaint'])->default('general_contact');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('position')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->json('subject'); // {fr, en, ar}
            $table->json('message'); // {fr, en, ar}
            $table->enum('preferred_language', ['fr', 'en', 'ar'])->default('fr');
            $table->enum('preferred_contact_method', ['email', 'phone', 'whatsapp'])->default('email');
            $table->json('skills')->nullable(); // array - pour "nous rejoindre"
            $table->string('availability')->nullable();
            $table->json('motivation')->nullable(); // {fr, en, ar}
            $table->string('cv_file_path')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->decimal('donation_amount', 10, 2)->nullable(); // pour demandes de don
            $table->enum('donation_frequency', ['one_time', 'monthly', 'yearly'])->nullable();
            $table->enum('status', ['new', 'in_progress', 'resolved', 'archived'])->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->json('response')->nullable(); // {fr, en, ar}
            $table->timestamp('responded_at')->nullable();
            $table->foreignId('responded_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['type', 'status']);
            $table->index(['status', 'priority']);
            $table->index(['assigned_to', 'status']);
            $table->index(['country_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
