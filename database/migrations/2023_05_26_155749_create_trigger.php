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
        DB::unprepared('CREATE TRIGGER tr_Image_Default AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO image_users (`user_id`, `url`) VALUES ( NEW.id, "https://st.quantrimang.com/photos/image/2017/04/08/anh-dai-dien-FB-200.jpg");
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger');
    }
};
