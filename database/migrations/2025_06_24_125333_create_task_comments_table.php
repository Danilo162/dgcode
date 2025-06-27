<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->text('content');
            $table->enum('type', ['comment', 'status_update', 'file_attachment'])->default('comment');
            $table->string('attachment_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['task_id', 'created_at']);
            $table->index(['user_id', 'created_at']);
            $table->index(['type', 'task_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_comments');
    }
};
