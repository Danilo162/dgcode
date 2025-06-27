<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration: create_event_odd_goals_table.php
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_odd_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('odd_goal_id')->constrained('odd_goals')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->unique(['event_id', 'odd_goal_id']);
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_odd_goals');
    }
};
