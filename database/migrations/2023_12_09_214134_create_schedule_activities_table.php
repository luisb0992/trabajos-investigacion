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
        Schema::create('schedule_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigation_work_id');
            $table->text('revision')->nullable();
            $table->text('description')->nullable();
            $table->text('analysis')->nullable();
            $table->text('drafting')->nullable();
            $table->text('conclusions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_activities');
    }
};
