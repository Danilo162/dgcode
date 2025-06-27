<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objectives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['strategic', 'operational', 'project_specific']);
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['not_started', 'in_progress', 'completed', 'on_hold', 'cancelled'])->default('not_started');
            $table->unsignedTinyInteger('progress_percentage')->default(0); // 0-100
            $table->foreignId('responsible_person_id')->nullable()->constrained('users');
            $table->decimal('budget_allocated', 15, 2)->nullable();
            $table->decimal('budget_spent', 15, 2)->nullable();
            $table->json('success_metrics')->nullable();
            $table->foreignId('parent_objective_id')->nullable()->constrained('objectives')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['organization_id', 'status']);
            $table->index(['responsible_person_id', 'status']);
            $table->index(['type', 'priority']);
            $table->index(['start_date', 'end_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objectives');
    }
};
