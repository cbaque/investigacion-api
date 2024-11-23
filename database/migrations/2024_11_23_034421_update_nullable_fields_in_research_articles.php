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
        Schema::table('research_articles', function (Blueprint $table) {
            $table->string('impact')->nullable()->change();
            $table->string('observation')->nullable()->change();
            $table->string('duration')->nullable()->change();
            $table->string('budget_one')->nullable()->change();
            $table->string('budget_two')->nullable()->change();
            $table->string('budget_three')->nullable()->change();

            $table->dropColumn('date_ini');
            $table->dropColumn('date_end');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_articles', function (Blueprint $table) {
            $table->string('impact')->nullable()->change();
            $table->string('observation')->nullable()->change();
            $table->string('duration')->nullable()->change();
            $table->string('budget_one')->nullable()->change();
            $table->string('budget_two')->nullable()->change();
            $table->string('budget_three')->nullable()->change();
                
            $table->dropColumn('date_ini');
            $table->dropColumn('date_end');
        });
    }
};
