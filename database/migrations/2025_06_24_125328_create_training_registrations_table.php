<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('position')->nullable();
            $table->enum('experience_level', ['beginner', 'intermediate', 'advanced'])->nullable();
            $table->json('motivation')->nullable(); // {fr, en, ar}
            $table->text('special_needs')->nullable();
            $table->text('dietary_restrictions')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'refunded'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('payment_reference')->nullable();
            $table->enum('registration_status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->enum('attendance_status', ['registered', 'attended', 'absent', 'partial'])->default('registered');
            $table->boolean('certificate_issued')->default(false);
            $table->string('certificate_url')->nullable();
            $table->unsignedTinyInteger('evaluation_score')->nullable(); // 1-10
            $table->json('feedback')->nullable(); // {fr, en, ar}
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['training_id', 'registration_status']);
            $table->index(['email', 'training_id']);
            $table->unique(['training_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_registrations');
    }
};
