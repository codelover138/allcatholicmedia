<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('youtube_channels')) {
            Schema::create('youtube_channels', function (Blueprint $table): void {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->string('youtube_channel_id', 100)->nullable()->unique();
                $table->string('youtube_handle', 120)->nullable();
                $table->string('uploads_playlist_id', 100)->nullable();
                $table->string('thumbnail', 500)->nullable();
                $table->string('banner', 500)->nullable();
                $table->text('description')->nullable();
                $table->string('custom_url', 255)->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamp('last_synced_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('youtube_channels');
    }
};
