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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->index()->nullable()->constrained('profiles');
            $table->text('body')->nullable();
            $table->text('title')->nullable();
            $table->text('comments')->nullable();
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->integer('likes')->nullable();
            $table->boolean('is_published')->default(1);
            $table->datetime('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
