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
        Schema::create('cms_translates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cms_id');
            $table->foreign('cms_id')->references('id')->on('cms')->onDelete('cascade');
            $table->string('title');
            $table->longText('content');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_translates');
    }
};
