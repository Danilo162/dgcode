<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('immigration_returns', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedTinyInteger('age')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('nationality');
            $table->foreignId('current_country')->constrained('countries');
            $table->string('current_city');
            $table->foreignId('target_country')->constrained('countries');
            $table->foreignId('target_region')->nullable()->constrained('regions');
            $table->foreignId('target_city')->nullable()->constrained('cities');
            $table->enum('education_level', ['none', 'primary', 'secondary', 'university', 'postgraduate'])->nullable();
            $table->json('skills')->nullable(); // array
            $table->json('work_experience')->nullable();
            $table->json('languages')->nullable(); // array
            $table->enum('family_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->unsignedTinyInteger('dependents_count')->default(0);
            $table->enum('financial_situation', ['very_poor', 'poor', 'average', 'good', 'excellent'])->nullable();
            $table->json('return_motivation'); // {fr, en, ar}
            $table->json('preferred_sectors')->nullable(); // array
            $table->json('assistance_needed')->nullable(); // array
            $table->enum('timeline', ['immediate', '3_months', '6_months', '1_year', 'flexible'])->default('flexible');
            $table->enum('status', ['registered', 'in_process', 'assisted', 'returned', 'follow_up', 'closed'])->default('registered');
            $table->foreignId('case_manager_id')->nullable()->constrained('users');
            $table->json('assistance_provided')->nullable();
            $table->json('follow_up_notes')->nullable(); // {fr, en, ar}
            $table->date('last_contact_date')->nullable();
            $table->date('return_date')->nullable();
            $table->text('success_story')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['status', 'case_manager_id']);
            $table->index(['current_country', 'target_country']);
            $table->index(['nationality', 'status']);
            $table->index(['timeline', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('immigration_returns');
    }
};
