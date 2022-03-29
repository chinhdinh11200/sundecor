<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use App\Models\News;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Slide;
use App\Models\Supporter;
use App\Models\Video;
use App\Models\WebInfo;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

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

        $menu_sales = Menu::where("menu_type_id",4)
            ->where('parent_menu_id', 0)
            ->where('status', true)
            ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->with(['products' => function($query) {
                $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        ->with('product_size')
                        ->take(8);
            }])
            ->get();

        $menu_tops = Menu::where('menu_type_id', 1)
            ->orderBY(DB::raw('ISNULL(menus.priority), priority'), 'ASC')
            ->where('status', true)->limit(4)->get();

        $menu_bottoms = Menu::where('menu_type_id', 3)
            ->orderBY(DB::raw('ISNULL(menus.priority), priority'), 'ASC')
            ->where('status', true)->limit(8)->get();

        $menu_connects = Menu::where('menu_type_id', 5)
            ->orderBY(DB::raw('ISNULL(menus.priority), priority'), 'ASC')
            ->where('status', true)->limit(8)->get();
            // dd($menu_connects);

        // $product_hots = Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
        //     ->join('menus', 'product_menu.subcategory_id', '=', 'menus.id')
        //     ->where('menu_type_id', 4)
        //     ->where('product_menu.priority', '<>', null)
        //     ->select('products.*', 'product_menu.subcategory_id AS menu_id', 'product_menu.priority')
        //     ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
        //     ->distinct()
        //     ->where('products.status', true)->get();

        $product_hot2s = Menu::where('menu_type_id', 4)->where('slug', 'like', '%hot%')->with('products')->first();
        // dd($product_hot2s);
        // Product::join('product_menu', 'product_menu.product_id', '=', 'products.id')
        //     ->join('menus', 'product_menu.subcategory_id', '=', 'menus.id')
        //     ->where('menu_type_id', 4)
        //     ->where('is_hot_product', true)
        //     ->where('product_menu.priority', '<>', null)
        //     ->select('products.*', 'product_menu.priority', 'menus.slug')
        //     ->orderBy(DB::raw('ISNULL(product_menu.priority), product_menu.priority'), 'ASC')
        //     ->distinct()
        //     ->where('products.status', true)->get();

        $videos = Video::orderBY(DB::raw('ISNULL(videos.priority), priority'), 'ASC')
        ->where('status', true)->limit(3)->get();

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

        $services = News::where('menu_id', 1)->get();

        view()->share([
            'main_menu1' => $main_menu1,
            'menu2' => $menu2,
            'menu_sales' => $menu_sales,
            'menu_tops' => $menu_tops,
            'menu_bottoms' => $menu_bottoms,
            'menu_connects' => $menu_connects,
            // 'product_hots' => $product_hots,
            'product_hot2s' => $product_hot2s,
            'videos' => $videos,
            'news_made' => $news_made,
            'news_know' => $news_know,
            'news_collection' => $news_collection,
            'news_tutorial' => $news_tutorial,
            'webInfo' => $webInfo,
            'banners' => $banners,
            'supporters' => $supporters,
            'services' => $services,
        ]);
    }
}
