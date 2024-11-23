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

            $table->decimal("budget_one", total: 8, places: 2);
            $table->decimal("budget_two", total: 8, places: 2);
            $table->decimal("budget_three", total: 8, places: 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_articles', function (Blueprint $table) {
            $table->decimal("budget_one", total: 8, places: 2);
            $table->decimal("budget_two", total: 8, places: 2);
            $table->decimal("budget_three", total: 8, places: 2);
        });
    }
};
