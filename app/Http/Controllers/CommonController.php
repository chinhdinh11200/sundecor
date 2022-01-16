<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{

    public function __construct()
    {
        $main_menu1 = Menu::where('parent_menu_id', 0)
                        ->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
                        // ->where('menu_types', 2)
                        ->limit(8)->get();
        $menu2 = Menu::where("parent_menu_id","<>",0)->where("status",1)->get();

        $product_hots = Product::where('is_hot_product', true)->distinct()->paginate(8);

//        $banner = banner::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->get();
//        $category = category::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->limit(8)->get();
//        $this->categories = $category;
        //$this->menu1 = $menu1;
        view()->share([
            'main_menu1'=>$main_menu1,
            'menu2'=>$menu2,
            'product_hots'=>$product_hots,
        ]);
    }
}
