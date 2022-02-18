<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Menutype;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Dịch vụ 5 sao',
            'slug' => 'dich-vu-5-sao.html',
            'title' => 'Dịch vụ 5 sao',
            'keyword' => 'sundecor, Dịch vụ 5 sao',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Công trình đã thực hiện',
            'slug' => 'cong-trinh-da-thuc-hien.html',
            'title' => 'Công trình đã thực hiện',
            'keyword' => 'sundecor, Công trình đã thực hiện',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Kiến thức về đèn',
            'slug' => 'kien-thuc-ve-den.html',
            'title' => 'Kiến thức về đèn',
            'keyword' => 'sundecor, Kiến thức về đèn',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Bộ sưu tập đèn',
            'slug' => 'bo-suu-tap-den.html',
            'title' => 'Bộ sưu tập đèn',
            'keyword' => 'sundecor, Bộ sưu tập đèn',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);
        Menu::create([
            'name' => 'Hướng dẫn sử dụng',
            'slug' => 'huong-dan-su-dung.html',
            'title' => 'Hướng dẫn sử dụng',
            'keyword' => 'sundecor, Hướng dẫn sử dụng',
            'menu_type_id' => 4,
            'parent_menu_id' => 0,
            'status' => true,
        ]);

        Menutype::create([
            'name' => 'Menu top'
        ]);

        Menutype::create([
            'name' => 'Menu chính'
        ]);

        Menutype::create([
            'name' => 'Menu chân trang'
        ]);

        Menutype::create([
            'name' => 'Menu khác'
        ]);
    }
}
