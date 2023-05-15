<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // for ($i = 0; $i < 5; $i++) {
        //     \DB::table('theme_types') -> insert([
        //         'mode_id' => 1,
        //         'url' => 'https://th.bing.com/th/id/R.dfa7c2c9c9b1af78336c0067e609898e?rik=ft7wIpi76TPdyQ&pid=ImgRaw&r=0',
        //         'type' => 0
        //     ]);
        // }
        
        // for ($i = 0; $i < 5; $i++) {
            // \DB::table('posts') -> insert([
            //     'user_id' => 4,
            //     'theme_type_id' => 1,
            //     'url_id' => 2,
            //     'status_id' => 2,
            //     'title' => 'Báo Pháp: "Messi sẽ rời PSG để chơi bóng ở Saudi Arabia"',
            //     'subheadline' => 'Truyền thông Pháp khẳng định Lionel Messi không gia hạn hợp đồng với PSG vào mùa hè này và ngôi sao Argentina sẽ chuyển đến chơi bóng ở Saudi Arabia cùng Cristiano Ronaldo.',
            //     'content' => 'Theo thỏa thuận này, Messi sẽ nhận được bản hợp đồng khổng lồ trị giá 522 triệu bảng tại CLB Al Hilal, thổi bay hợp đồng kỷ lục trước đó của Cristiano Ronaldo có trị giá 200 triệu bảng tại CLB Al Nassr.
            //         Tuy nhiên, Paris Saint Germain (PSG) hiện tại không đưa ra bình luận nào về thông tin của AFP, trừ việc nhắc lại rằng hợp đồng của Messi kéo dài đến hết mùa giải này.
            //         Trước đó, tờ L"Equipe của Pháp cũng khẳng định Messi đã đạt được thỏa thuận miệng với đội bóng ở Saudi Arabia nhưng chưa có hợp đồng nào được ký kết. Tờ báo nước Pháp tuyên bố lời đề nghị dành cho Messi là một hợp đồng có thời hạn hai năm, kèm theo tùy chọn gia hạn sau khi hợp đồng hết hạn.
            //         Khả năng Messi đến Saudi Arabia ngày càng lớn, khi ngôi sao người Argentina vừa nhận án phạt treo giò 2 tuần tại PSG sau chuyến đi trái phép đến đất nước ở Trung Đông hôm 1/5.',
            // ]);
        // }
        // \DB::table('users') -> delete();
        // Schema::dropIfExists('users');
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_mode_id_foreign');
        });
        Schema::enableForeignKeyConstraints();
    }
}
