<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('axe_id')->constrained('axes')->onDelete('cascade');
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['task', 'milestone', 'deliverable'])->default('task');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->enum('status', ['todo', 'in_progress', 'review', 'completed', 'cancelled'])->default('todo');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->date('due_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->decimal('estimated_hours', 8, 2)->nullable();
            $table->decimal('actual_hours', 8, 2)->nullable();
            $table->unsignedTinyInteger('progress_percentage')->default(0); // 0-100
            $table->json('dependencies')->nullable(); // array d'IDs de tâches
            $table->json('attachments')->nullable(); // array de URLs
            $table->json('tags')->nullable(); // array
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['axe_id', 'status']);
            $table->index(['assigned_to', 'status']);
            $table->index(['project_id', 'status']);
            $table->index(['due_date', 'status']);
            $table->index(['priority', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
