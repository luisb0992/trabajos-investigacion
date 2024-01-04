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
        Schema::create('homeland_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigation_work_id');
            $table->text('bibliography')->nullable();
            $table->text('homeland_plans')->nullable();
            $table->text('historical_objectives')->nullable();
            $table->text('national_objectives')->nullable();
            $table->text('strategic_objectives')->nullable();
            $table->text('general_objectives')->nullable();
            $table->text('relationship_objectives')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homeland_plans');
    }
};
