<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('youtube_channel_videos')) {
            Schema::create('youtube_channel_videos', function (Blueprint $table): void {
                $table->id();
                $table->foreignId('youtube_channel_id')->constrained('youtube_channels')->cascadeOnDelete();
                $table->string('youtube_video_id', 50)->unique();
                $table->string('title');
                $table->string('slug')->nullable();
                $table->text('description')->nullable();
                $table->string('thumbnail', 500)->nullable();
                $table->timestamp('published_at')->nullable();
                $table->string('video_url', 500);
                $table->string('embed_url', 500);
                $table->string('duration', 50)->nullable();
                $table->unsignedBigInteger('view_count')->default(0);
                $table->boolean('is_live')->default(false);
                $table->integer('position')->default(0);
                $table->json('raw_payload')->nullable();
                $table->timestamps();

                $table->index(['youtube_channel_id', 'published_at']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('youtube_channel_videos');
    }
};
