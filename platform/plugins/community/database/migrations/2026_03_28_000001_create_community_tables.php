<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        // ── Activity Feed ─────────────────────────────────────────────────
        if (! Schema::hasTable('community_posts')) {
            Schema::create('community_posts', function (Blueprint $table): void {
                $table->id();
                $table->unsignedBigInteger('member_id');
                $table->string('type', 20)->default('text'); // text, link, photo
                $table->text('content');
                $table->string('media_url', 500)->nullable();
                $table->string('link_url', 500)->nullable();
                $table->string('link_title', 255)->nullable();
                $table->string('link_image', 500)->nullable();
                $table->unsignedInteger('likes_count')->default(0);
                $table->unsignedInteger('comments_count')->default(0);
                $table->string('status', 20)->default('published');
                $table->timestamps();

                $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
                $table->index(['member_id', 'created_at']);
                $table->index('status');
            });
        }

        if (! Schema::hasTable('community_post_likes')) {
            Schema::create('community_post_likes', function (Blueprint $table): void {
                $table->unsignedBigInteger('post_id');
                $table->unsignedBigInteger('member_id');
                $table->timestamp('created_at')->useCurrent();

                $table->primary(['post_id', 'member_id']);
                $table->foreign('post_id')->references('id')->on('community_posts')->cascadeOnDelete();
                $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
            });
        }

        // ── Groups ────────────────────────────────────────────────────────
        if (! Schema::hasTable('community_groups')) {
            Schema::create('community_groups', function (Blueprint $table): void {
                $table->id();
                $table->string('name', 255);
                $table->string('slug', 255)->unique();
                $table->text('description')->nullable();
                $table->string('cover_image', 500)->nullable();
                $table->string('privacy', 20)->default('public'); // public, private
                $table->unsignedBigInteger('creator_id');
                $table->unsignedInteger('members_count')->default(1);
                $table->string('status', 20)->default('published');
                $table->timestamps();

                $table->foreign('creator_id')->references('id')->on('members')->cascadeOnDelete();
                $table->index('status');
            });
        }

        if (! Schema::hasTable('community_group_members')) {
            Schema::create('community_group_members', function (Blueprint $table): void {
                $table->unsignedBigInteger('group_id');
                $table->unsignedBigInteger('member_id');
                $table->string('role', 20)->default('member'); // admin, member
                $table->timestamp('joined_at')->useCurrent();

                $table->primary(['group_id', 'member_id']);
                $table->foreign('group_id')->references('id')->on('community_groups')->cascadeOnDelete();
                $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
            });
        }

        // ── Forums ────────────────────────────────────────────────────────
        if (! Schema::hasTable('forum_categories')) {
            Schema::create('forum_categories', function (Blueprint $table): void {
                $table->id();
                $table->string('name', 255);
                $table->string('slug', 255)->unique();
                $table->text('description')->nullable();
                $table->integer('order_column')->default(0);
                $table->unsignedInteger('topics_count')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('forum_topics')) {
            Schema::create('forum_topics', function (Blueprint $table): void {
                $table->id();
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('member_id');
                $table->string('title', 255);
                $table->string('slug', 255)->unique();
                $table->text('content');
                $table->unsignedInteger('views')->default(0);
                $table->unsignedInteger('replies_count')->default(0);
                $table->boolean('is_pinned')->default(false);
                $table->boolean('is_locked')->default(false);
                $table->string('status', 20)->default('published');
                $table->timestamp('last_reply_at')->nullable();
                $table->timestamps();

                $table->foreign('category_id')->references('id')->on('forum_categories')->cascadeOnDelete();
                $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
                $table->index(['category_id', 'status', 'created_at']);
            });
        }

        if (! Schema::hasTable('forum_replies')) {
            Schema::create('forum_replies', function (Blueprint $table): void {
                $table->id();
                $table->unsignedBigInteger('topic_id');
                $table->unsignedBigInteger('member_id');
                $table->text('content');
                $table->string('status', 20)->default('published');
                $table->timestamps();

                $table->foreign('topic_id')->references('id')->on('forum_topics')->cascadeOnDelete();
                $table->foreign('member_id')->references('id')->on('members')->cascadeOnDelete();
                $table->index(['topic_id', 'status', 'created_at']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('forum_replies');
        Schema::dropIfExists('forum_topics');
        Schema::dropIfExists('forum_categories');
        Schema::dropIfExists('community_group_members');
        Schema::dropIfExists('community_groups');
        Schema::dropIfExists('community_post_likes');
        Schema::dropIfExists('community_posts');
    }
};
