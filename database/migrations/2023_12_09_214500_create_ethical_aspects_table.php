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
        Schema::create('ethical_aspects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigation_work_id');
            $table->boolean('principles_beneficence')->default(false);
            $table->boolean('ethics_commission')->default(false);
            $table->boolean('biological_samples')->default(false);
            $table->boolean('medical_attention')->default(false);
            $table->boolean('protection_mechanisms')->default(false);
            $table->boolean('collective_informed')->default(false);
            $table->boolean('informed_consent')->default(false);
            $table->boolean('person_investigation')->default(false);
            $table->boolean('data_confidentiality')->default(false);
            $table->boolean('research_impact')->default(false);
            $table->boolean('description_procedures')->default(false);
            $table->boolean('query_forecast')->default(false);
            $table->boolean('consideration_impact')->default(false);
            $table->boolean('animal_sacrifice')->default(false);
            $table->boolean('study_animals')->default(false);
            $table->boolean('animal_habitat')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ethical_aspects');
    }
};
