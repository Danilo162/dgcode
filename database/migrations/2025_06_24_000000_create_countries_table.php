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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 2)->unique(); // ISO 3166-1 alpha-2 (CI, FR, etc.)
            $table->string('code3', 3)->unique(); // ISO 3166-1 alpha-3 (CIV, FRA, etc.)
            $table->json('name'); // {fr: "Côte d'Ivoire", en: "Ivory Coast", ar: "ساحل العاج"}
            $table->string('flag_emoji', 10)->nullable(); // 🇨🇮
            $table->string('phone_code', 10)->nullable(); // +225
            $table->string('currency_code', 3)->nullable(); // XOF, EUR
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['is_active', 'deleted_at']);
            $table->index(['code', 'is_active']);
            $table->index(['phone_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
