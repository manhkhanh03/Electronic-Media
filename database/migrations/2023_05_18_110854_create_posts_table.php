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
            $table->string('id', 20);
            $table->unsignedBigInteger('user_id')->default(2);
            $table->unsignedBigInteger('theme_type_id')->default(1);
            $table->unsignedBigInteger('url_id')->default(1);
            $table->unsignedBigInteger('status_id')->default(0);
            $table->integer('hot')->default(0);
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
