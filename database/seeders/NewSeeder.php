<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new1 = News::where('slug' , 'bao-tri-tron-doi.html')->first();
        !$new1 ? News::create([
            'name' => 'Bảo trì trọn đời',
            'slug' => 'bao-tri-tron-doi.html',
            'title' => 'Bảo trì trọn đời',
            'keyword' => 'sundecor, Bảo trì trọn đời',
            'menu_id' => 1,
            'status' => true,
        ]) : null;
        $new2 = News::where('slug' , 'top-2-viet-nam.html')->first();
        !$new2 ? News::create([
            'name' => 'Top 1 Việt Nam',
            'slug' => 'top-1-viet-nam.html',
            'title' => 'Top 1 Việt Nam',
            'keyword' => 'sundecor, Top 1 Việt Nam',
            'menu_id' => 1,
            'status' => true,
        ]) : null;
        $new3 = News::where('slug' , 'bao-hanh-10-nam.html')->first();
        !$new3 ? News::create([
            'name' => 'Bảo hành 10 năm',
            'slug' => 'bao-hanh-10-nam.html',
            'title' => 'Bảo hành 10 năm',
            'keyword' => 'sundecor, Bảo hành 10 năm',
            'menu_id' => 1,
            'status' => true,
        ]) : null;
        $new4 = News::where('slug' , 'uy-tin.html')->first();
        !$new4 ? News::create([
            'name' => 'Uy tín',
            'slug' => 'uy-tin.html',
            'title' => 'Uy tín',
            'keyword' => 'sundecor, Uy tín',
            'menu_id' => 1,
            'status' => true,
        ]) : null;
        $new5 = News::where('slug' , 'lap-dat-toan-quoc.html')->first();
        !$new5 ? News::create([
            'name' => 'Lắp đặt toàn quốc',
            'slug' => 'lap-dat-toan-quoc.html',
            'title' => 'Lắp đặt toàn quốc',
            'keyword' => 'sundecor, Lắp đặt toàn quốc',
            'menu_id' => 1,
            'status' => true,
        ]) : null;
        $new6 = News::where('slug' , 'san-pham-da-nang.html')->first();
        !$new6 ? News::create([
            'name' => 'Sản phẩm đa năng',
            'slug' => 'san-pham-da-nang.html',
            'title' => 'Sản phẩm đa năng',
            'keyword' => 'sundecor, Sản phẩm đa năng',
            'menu_id' => 1,
            'status' => true,
        ]) : null;
    }
}
