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
        Schema::create('item_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigation_work_id');
            $table->decimal('incentive', 12, 2)->nullable();
            $table->decimal('material_supplier', 12, 2)->nullable();
            $table->decimal('services', 12, 2)->nullable();
            $table->decimal('viatic', 12, 2)->nullable();
            $table->decimal('mobilization', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_services');
    }
};
