<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use App\Models\News;
use App\Models\Product;
use App\Models\Slide;
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
            ->limit(8)->get();
        $menu2 = Menu::where("parent_menu_id", "<>", 0)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->where("status", 1)
            ->get();

        $product_hots = Product::where('is_hot_product', true)->distinct()->paginate(8);

        $videos = Video::orderBY(DB::raw('ISNULL(videos.priority)'), 'ASC')->paginate(3);

        $news_made = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 2)->paginate(4);

        $news_know = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 3)->paginate(2);

        $news_collection = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 4)->paginate(2);

        $news_tutorial = News::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->where('menu_id', 5)->paginate(2);

        $webInfo = WebInfo::first();

        $banners = Slide::orderBY(DB::raw('ISNULL(news.priority)'), 'ASC')->limit(8)->get();
        //        $banner = banner::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->get();
        //        $category = category::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->limit(8)->get();
        //        $this->categories = $category;
        //$this->menu1 = $menu1;
        view()->share([
            'main_menu1' => $main_menu1,
            'menu2' => $menu2,
            'product_hots' => $product_hots,
            'videos' => $videos,
            'news_made' => $news_made,
            'news_know' => $news_know,
            'news_collection' => $news_collection,
            'news_tutorial' => $news_tutorial,
            'webInfo' => $webInfo,
        ]);
    }
}
