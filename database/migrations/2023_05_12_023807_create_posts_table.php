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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('theme_type_id');
            $table->unsignedBigInteger('url_id');
            $table->unsignedBigInteger('status_id');
            $table->string('title', 1200)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('subheadline', 1200)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');     
            $table->text('content')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->integer('hot')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('theme_type_id')->references('id')->on('theme_types');
            // $table->foreign('url_id')->references('id')->on('urls');
            // $table->foreign('status_id')->references('id')->on('post_status');
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
