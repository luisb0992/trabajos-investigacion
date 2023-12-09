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
        Schema::table('investigation_works', function (Blueprint $table) {
            $table->text('es_summary')->nullable()->after('title');
            $table->text('en_summary')->nullable()->after('es_summary');
            $table->string('email')->nullable()->after('en_summary');
            $table->string('profile')->nullable()->after('email');
            $table->string('orcid_code')->nullable()->after('profile');
            $table->unsignedBigInteger('type')->nullable()->after('orcid_code');
            $table->unsignedBigInteger('status')->nullable()->after('type');
            $table->string('location')->nullable()->after('status'); // ubicación
            $table->text('approach')->nullable()->after('location'); // planteamiento
            $table->text('justification')->nullable()->after('approach');    // justificación
            $table->text('background')->nullable()->after('justification');   // antecedentes
            $table->text('general_objective')->nullable()->after('background');    // objetivo general
            $table->text('specific_objective')->nullable()->after('general_objective');  // objetivos específicos
            $table->text('expected_results')->nullable()->after('specific_objective'); // resultados esperados
            $table->string('methodology')->nullable()->after('expected_results');  // metodología
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('investigation_works', function (Blueprint $table) {
            $table->dropColumn([
                'es_summary',
                'en_summary',
                'email',
                'profile',
                'orcid_code',
                'type',
                'status',
                'location',
                'approach',
                'justification',
                'background',
                'general_objective',
                'specific_objective',
                'expected_results',
                'methodology',
            ]);
        });
    }
};
