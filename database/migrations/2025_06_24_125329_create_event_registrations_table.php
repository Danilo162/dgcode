<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('organization')->nullable();
            $table->string('position')->nullable();
            $table->text('dietary_restrictions')->nullable();
            $table->text('special_needs')->nullable();
            $table->enum('registration_status', ['confirmed', 'cancelled', 'waitlist'])->default('confirmed');
            $table->enum('attendance_status', ['registered', 'attended', 'absent'])->default('registered');
            $table->timestamp('check_in_time')->nullable();
            $table->timestamp('check_out_time')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'refunded'])->default('pending');
            $table->string('payment_reference')->nullable();
            $table->string('qr_code')->nullable(); // pour check-in
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['event_id', 'registration_status']);
            $table->index(['email', 'event_id']);
            $table->unique(['event_id', 'email']);
            $table->index(['qr_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
