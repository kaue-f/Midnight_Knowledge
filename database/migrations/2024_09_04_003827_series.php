<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('synopsis')->nullable();
            $table->foreignId('classification_id')->constrained()->onDelete('set null');
            $table->integer('episodes');
            $table->integer('season');
            $table->date('release_date')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });

        schema::create('serie_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained()->onDelete('cascade');
            $table->foreignId('genre_id')->constrained()->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('serie_user', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('serie_id')->constrained()->onDelete('cascade');
            $table->boolean('library');
            $table->foreignId('status_id')->constrained();
            $table->boolean('favorite')->nullable();
            $table->timestamps();
        });

        Schema::create('serie_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('set null');
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::create('serie_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('set null');
            $table->float('rating')->nullable();
            $table->timestamps();
            $table->unique(['serie_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
        Schema::dropIfExists('serie_genre');
        Schema::dropIfExists('serie_user');
        Schema::dropIfExists('serie_comments');
        Schema::dropIfExists('serie_ratings');
    }
};
