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
        // Menu::truncate();
        // Menutype::truncate();

        $menu_top = Menutype::where('name', 'Menu top')->first();
        !$menu_top ? Menutype::create([
            'name' => 'Menu top'
        ]) : null;

        $menu_main = Menutype::where('name', 'Menu chính')->first();
        !$menu_main ? Menutype::create([
            'name' => 'Menu chính'
        ]) : null;

        $menu_bottom = Menutype::where('name', 'Menu chân trang')->first();
        !$menu_bottom ? Menutype::create([
            'name' => 'Menu chân trang'
        ]) : null;

        $menu_sale = Menutype::where('name', 'Menu sale')->first();
        !$menu_sale ? Menutype::create([
            'name' => 'Menu sale'
        ]) : null;

        $menu_connect = Menutype::where('name', 'Menu kết nối')->first();
        !$menu_connect ? Menutype::create([
            'name' => 'Menu kết nối'
        ]) : null;

        $menu_other = Menutype::where('name', 'Menu khác')->first();
        !$menu_other ? Menutype::create([
            'name' => 'Menu khác'
        ]) : null;

        $service = Menu::where('slug' , 'dich-vu-5-sao.html')->first();
        !$service ? Menu::create([
            'name' => 'Dịch vụ 5 sao',
            'slug' => 'dich-vu-5-sao.html',
            'title' => 'Dịch vụ 5 sao',
            'keyword' => 'sundecor, Dịch vụ 5 sao',
            'menu_type_id' => 6,
            'parent_menu_id' => 0,
            'status' => true,
        ]) : null;

        $construction = Menu::where('slug' , 'cong-trinh-da-thuc-hien.html')->first();
        !$construction ? Menu::create([
            'name' => 'Công trình đã thực hiện',
            'slug' => 'cong-trinh-da-thuc-hien.html',
            'title' => 'Công trình đã thực hiện',
            'keyword' => 'sundecor, Công trình đã thực hiện',
            'menu_type_id' => 6,
            'parent_menu_id' => 0,
            'status' => true,
        ]) : null;

        $know = Menu::where('slug' , 'kien-thuc-ve-den.html')->first();
        !$know ? Menu::create([
            'name' => 'Kiến thức về đèn',
            'slug' => 'kien-thuc-ve-den.html',
            'title' => 'Kiến thức về đèn',
            'keyword' => 'sundecor, Kiến thức về đèn',
            'menu_type_id' => 6,
            'parent_menu_id' => 0,
            'status' => true,
        ]) : null;

        $collection = Menu::where('slug' , 'bo-suu-tap-den.html')->first();
        !$collection ? Menu::create([
            'name' => 'Bộ sưu tập đèn',
            'slug' => 'bo-suu-tap-den.html',
            'title' => 'Bộ sưu tập đèn',
            'keyword' => 'sundecor, Bộ sưu tập đèn',
            'menu_type_id' => 6,
            'parent_menu_id' => 0,
            'status' => true,
        ]) : null;

        $tutorial = Menu::where('slug' , 'huong-dan-su-dung.html',)->first();
        !$tutorial ? Menu::create([
            'name' => 'Hướng dẫn sử dụng',
            'slug' => 'huong-dan-su-dung.html',
            'title' => 'Hướng dẫn sử dụng',
            'keyword' => 'sundecor, Hướng dẫn sử dụng',
            'menu_type_id' => 6,
            'parent_menu_id' => 0,
            'status' => true,
        ]) : null;

    }
}
