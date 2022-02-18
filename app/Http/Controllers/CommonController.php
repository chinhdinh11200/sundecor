<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use App\Models\News;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Supporter;
use App\Models\Video;
use App\Models\WebInfo;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{

    public function __construct()
    {
        $main_menu1 = Menu::where('parent_menu_id', 0)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->where('menu_type_id', 2)
            ->where('status', true)
            ->limit(8)->get();
        $menu2 = Menu::where("parent_menu_id", "<>", 0)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->where('status', true)
            ->get();

        $menu_tops = Menu::where('menu_type_id', 1)->orderBY(DB::raw('ISNULL(menus.priority)'), 'ASC')
        ->where('status', true)->limit(4)->get();

        $menu_bottoms = Menu::where('menu_type_id', 3)->orderBY(DB::raw('ISNULL(menus.priority)'), 'ASC')
        ->where('status', true)->limit(8)->get();

        $product_hots = Product::where('is_hot_product', true)->distinct()
        ->where('status', true)->paginate(8);

        $videos = Video::orderBY(DB::raw('ISNULL(videos.priority)'), 'ASC')
        ->where('status', true)->paginate(3);

        $news_made = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 2)
        ->where('status', true)->paginate(4);

        $news_know = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 3)
        ->where('status', true)->paginate(2);

        $news_collection = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 4)
        ->where('status', true)->paginate(2);

        $news_tutorial = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 5)
        ->where('status', true)->paginate(2);

        $webInfo = WebInfo::first();

        $banners = Slide::orderBY(DB::raw('ISNULL(slides.priority)'), 'ASC')
        ->where('status', true)->limit(8)->get();

        $supporters = Supporter::where('status', true)->get();

        //        $banner = banner::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->get();
        //        $category = category::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->limit(8)->get();
        //        $this->categories = $category;
        //$this->menu1 = $menu1;
        view()->share([
            'main_menu1' => $main_menu1,
            'menu2' => $menu2,
            'menu_tops' => $menu_tops,
            'menu_bottoms' => $menu_bottoms,
            'product_hots' => $product_hots,
            'videos' => $videos,
            'news_made' => $news_made,
            'news_know' => $news_know,
            'news_collection' => $news_collection,
            'news_tutorial' => $news_tutorial,
            'webInfo' => $webInfo,
            'banners' => $banners,
            'supporters' => $supporters,
        ]);
    }
}
