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
        Schema::create('research_articles', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name_project");
            $table->string("faculty");
            $table->string("rcu");
            $table->string("date_ini");
            $table->string("date_end");
            $table->string("status");
            $table->string("advance");
            $table->string("impact");
            $table->string("observation");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_articles');
    }
};
