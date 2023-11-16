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
        Schema::create('work_authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investigation_work_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable()->unique();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_authors');
    }
};
