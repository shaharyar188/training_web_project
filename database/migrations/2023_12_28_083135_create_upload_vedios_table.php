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
        Schema::create('upload_vedios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('subcategory');
            $table->string('video_detail_heading');
            $table->string('video_detail_description');
            $table->string('video');
            $table->string('video_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_vedios');
    }
};
