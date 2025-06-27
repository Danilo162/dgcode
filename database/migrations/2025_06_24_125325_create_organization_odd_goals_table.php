<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: create_organization_odd_goals_table.php
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_odd_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade');
            $table->foreignId('odd_goal_id')->constrained('odd_goals')->onDelete('cascade');
            $table->enum('priority_level', ['primary', 'secondary', 'tertiary'])->default('secondary');
            $table->unsignedTinyInteger('focus_percentage')->default(0); // 0-100
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->unique(['organization_id', 'odd_goal_id']);
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_odd_goals');
    }
};
