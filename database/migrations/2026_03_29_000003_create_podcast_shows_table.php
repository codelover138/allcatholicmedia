<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('podcast_shows')) {
            Schema::create('podcast_shows', function (Blueprint $table): void {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->string('thumbnail', 500)->nullable();
                $table->string('banner', 500)->nullable();
                $table->text('description')->nullable();
                $table->string('category', 120)->nullable();
                $table->string('website_url', 500)->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('podcast_shows');
    }
};
