<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_odd_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('odd_goal_id')->constrained('odd_goals')->onDelete('cascade');
            $table->foreignId('odd_target_id')->nullable()->constrained('odd_targets')->onDelete('set null');
            $table->enum('impact_level', ['primary', 'secondary', 'indirect'])->default('secondary');
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->unique(['project_id', 'odd_goal_id']);
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_odd_goals');
    }
};
