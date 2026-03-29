<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('podcast_episodes')) {
            Schema::create('podcast_episodes', function (Blueprint $table): void {
                $table->id();
                $table->foreignId('podcast_show_id')->constrained('podcast_shows')->cascadeOnDelete();
                $table->string('title');
                $table->string('slug')->nullable();
                $table->text('description')->nullable();
                $table->string('thumbnail', 500)->nullable();
                // audio_url: direct MP3/WAV for HTML5 player
                $table->string('audio_url', 500)->nullable();
                // embed_url: SoundCloud / YouTube iframe src
                $table->string('embed_url', 500)->nullable();
                // html5 | soundcloud | youtube | external
                $table->string('embed_type', 30)->default('html5');
                $table->string('duration', 30)->nullable();
                $table->unsignedInteger('episode_number')->default(0);
                $table->boolean('is_featured')->default(false);
                $table->timestamp('published_at')->nullable();
                $table->timestamps();

                $table->index(['podcast_show_id', 'published_at']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('podcast_episodes');
    }
};
