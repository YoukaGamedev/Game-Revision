<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_revisions', function (Blueprint $table) {
            $table->id();
            $table->string('game_title');
            $table->string('platform');
            $table->date('revision_date');
            $table->string('revision_type');
            $table->text('description');

            // ✅ Gambar (opsional)
            $table->string('image')->nullable();

            // ✅ Link GitHub (opsional)
            $table->string('github_link')->nullable();

            $table->enum('status', ['pending', 'in_progress', 'completed', 'error'])->default('pending');
            $table->integer('priority')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_revisions');
    }
};
