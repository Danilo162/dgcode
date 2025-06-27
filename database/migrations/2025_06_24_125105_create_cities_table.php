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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
            $table->json('name'); // {fr: "Bingerville", en: "Bingerville", ar: "بينجرفيل"}
            $table->decimal('latitude', 10, 8)->nullable(); // 5.3477777
            $table->decimal('longitude', 11, 8)->nullable(); // -3.9022222
            $table->unsignedInteger('population')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Index pour performance
            $table->index(['region_id', 'is_active']);
            $table->index(['is_active', 'deleted_at']);
            $table->index(['latitude', 'longitude']); // Pour recherches géographiques
            $table->index(['population']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
