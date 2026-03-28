<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('live_streams')) {
            Schema::create('live_streams', function (Blueprint $table): void {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('embed_url', 500);
                $table->string('source_name', 255)->nullable();
                $table->string('location', 255)->nullable();
                $table->boolean('is_live')->default(false);
                $table->dateTime('scheduled_at')->nullable();
                $table->string('thumbnail', 500)->nullable();
                $table->integer('order_column')->default(0);
                $table->string('status', 50)->default('published');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('live_streams');
    }
};
