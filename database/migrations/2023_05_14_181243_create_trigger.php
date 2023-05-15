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
         DB::unprepared('CREATE TRIGGER tr_User_Default AFTER INSERT ON `logins` FOR EACH ROW
            BEGIN
                INSERT INTO users (`user_role_id`, `login_id`, `name`) VALUES (4, NEW.id, CONCAT("NguoiDoc", NEW.id));
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
