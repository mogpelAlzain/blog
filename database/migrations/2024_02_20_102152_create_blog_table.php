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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('en_title');
            $table->string('ar_title');
            $table->text('en_content');
            $table->text('ar_content');
            $table->string('thumbnail');
            // $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->constrained('users')->references('id');
            // $table->unsignedBigInteger('category_id');
            $table->foreignId('category_id')->constrained('categories')->references('id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
