<?php

// Migration: create_project_organizations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade');
            $table->enum('role', ['lead', 'partner', 'funder', 'implementer', 'beneficiary']);
            $table->enum('contribution_type', ['financial', 'technical', 'logistical', 'advocacy'])->nullable();
            $table->decimal('contribution_amount', 15, 2)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->unique(['project_id', 'organization_id']);
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_organizations');
    }
};
