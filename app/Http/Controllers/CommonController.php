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
            ->where('menu_type_id', 2)
            ->where('status', true)
            ->get();

        $menu_sales = Menu::where("parent_menu_id", 0)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->where('menu_type_id', 4)
            ->where('status', true)
            ->get();

        $menu_tops = Menu::where('menu_type_id', 1)
            ->orderBY(DB::raw('ISNULL(menus.priority), priority'), 'ASC')
            ->where('status', true)->limit(4)->get();

        $menu_bottoms = Menu::where('menu_type_id', 3)
            ->orderBY(DB::raw('ISNULL(menus.priority), priority'), 'ASC')
            ->where('status', true)->limit(8)->get();

        $product_hots = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
            ->join('menus', 'product_menu.subcategory_id', '=', 'menus.id')
            ->where('menu_type_id', 4)
            ->where('product_menu.priority', '<>', null)
            ->select('products.*', 'product_menu.subcategory_id AS menu_id', 'product_menu.priority')
            ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
            ->distinct()
            ->where('products.status', true)->get();

        $product_hot2s = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
            ->join('menus', 'product_menu.subcategory_id', '=', 'menus.id')
            ->where('menu_type_id', 4)
            ->where('is_hot_product', true)
            ->where('product_menu.priority', '<>', null)
            ->select('products.*', 'product_menu.priority')
            ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
            ->distinct()
            ->where('products.status', true)->get();
        // dd($product_hot2s);
        $videos = Video::orderBY(DB::raw('ISNULL(videos.priority), priority'), 'ASC')
        ->where('status', true)->paginate(3);

        $news_made = News::orderBY(DB::raw('ISNULL(news.priority), priority'), 'ASC')->where('menu_id', 2)
        ->where('status', true)->paginate(4);

        $news_know = News::orderBY(DB::raw('ISNULL(news.priority), priority'), 'ASC')->where('menu_id', 3)
        ->where('status', true)->paginate(2);

        $news_collection = News::orderBY(DB::raw('ISNULL(news.priority), priority'), 'ASC')->where('menu_id', 4)
        ->where('status', true)->paginate(2);

        $news_tutorial = News::orderBY(DB::raw('ISNULL(news.priority), priority'), 'ASC')->where('menu_id', 5)
        ->where('status', true)->paginate(2);

        $webInfo = WebInfo::first();

        $banners = Slide::orderBY(DB::raw('ISNULL(slides.priority), priority'), 'ASC')
        ->where('status', true)->limit(8)->get();

        $supporters = Supporter::where('status', true)->orderBY(DB::raw('ISNULL(supporters.priority), priority'), 'ASC')->get();

        //        $banner = banner::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->get();
        //        $category = category::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->limit(8)->get();
        //        $this->categories = $category;
        //$this->menu1 = $menu1;
        view()->share([
            'main_menu1' => $main_menu1,
            'menu2' => $menu2,
            'menu_sales' => $menu_sales,
            'menu_tops' => $menu_tops,
            'menu_bottoms' => $menu_bottoms,
            'product_hots' => $product_hots,
            'product_hot2s' => $product_hot2s,
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
