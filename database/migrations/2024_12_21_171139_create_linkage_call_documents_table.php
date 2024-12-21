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
        Schema::create('linkage_call_documents', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("path");
            $table->boolean("status")->default(true);
            $table->unsignedBigInteger('linkage_call_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('linkage_call_id')->references('id')->on('linkage_calls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linkage_call_documents');
    }
};
