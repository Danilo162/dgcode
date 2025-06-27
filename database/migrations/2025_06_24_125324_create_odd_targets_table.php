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
        Schema::create('odd_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('odd_goal_id')->constrained('odd_goals')->onDelete('cascade');
            $table->string('target_number', 10); // ex: 1.1, 1.2, 1.a, 1.b
            $table->json('title'); // {fr, en, ar}
            $table->json('description'); // {fr, en, ar}
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Contraintes uniques
            $table->unique(['odd_goal_id', 'target_number']);

            // Index pour performance
            $table->index(['odd_goal_id', 'is_active']);
            $table->index(['target_number']);
            $table->index(['is_active', 'deleted_at']);

            // Foreign keys (ajoutées après création des tables users)
            // $table->foreign('created_by')->references('id')->on('users');
            // $table->foreign('updated_by')->references('id')->on('users');
            // $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odd_targets');
    }
};
