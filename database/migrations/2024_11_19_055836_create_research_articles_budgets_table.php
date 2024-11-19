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
        Schema::create('research_articles_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('research_article_id');
            $table->integer("year");
            $table->decimal("amount", total: 8, places: 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('research_article_id')->references('id')->on('research_articles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_articles_budgets');
    }
};
