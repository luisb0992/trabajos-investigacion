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
        Schema::table('schedule_activities', function (Blueprint $table) {

            // eliminar
            $table->dropColumn([
                'revision',
                'description',
                'analysis',
                'drafting',
                'conclusions',
            ]);
        });

        Schema::table('schedule_activities', function (Blueprint $table) {

            // agregar
            $table->json('revision')->nullable()->after('investigation_work_id');
            $table->json('description')->nullable()->after('revision');
            $table->json('analysis')->nullable()->after('description');
            $table->json('drafting')->nullable()->after('analysis');
            $table->json('conclusions')->nullable()->after('drafting');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedule_activities', function (Blueprint $table) {
            $table->dropColumn('revision');
            $table->dropColumn('description');
            $table->dropColumn('analysis');
            $table->dropColumn('drafting');
            $table->dropColumn('conclusions');
        });

        Schema::table('schedule_activities', function (Blueprint $table) {

            // agregar
            $table->text('revision')->nullable()->after('investigation_work_id');
            $table->text('description')->nullable()->after('revision');
            $table->text('analysis')->nullable()->after('description');
            $table->text('drafting')->nullable()->after('analysis');
            $table->text('conclusions')->nullable()->after('drafting');
        });
    }
};
