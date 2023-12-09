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
        Schema::table('work_authors', function (Blueprint $table) {
            $table->unsignedBigInteger('dni')->nullable()->after('email');
            $table->string('phone')->nullable()->after('dni');
            $table->string('level_instruction')->nullable()->after('phone');
            $table->text('address')->nullable()->after('level_instruction');
            $table->string('function_project')->nullable()->after('address');
            // $table->string('research_center')->nullable()->after('function_project');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('work_authors', function (Blueprint $table) {
            $table->dropColumn('dni');
            $table->dropColumn('phone');
            $table->dropColumn('level_instruction');
            $table->dropColumn('address');
            $table->dropColumn('function_project');
            // $table->dropColumn('research_center');
        });
    }
};
