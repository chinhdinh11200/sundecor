<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{

    public function __construct()
    {
        $main_menu1 = Menu::where('parent_menu_id', 0)->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->limit(8)->get();
        $menu2 = Menu::where("parent_menu_id","<>",0)->where("status",1)->get();
//        $banner = banner::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->get();
//        $category = category::where('is_active',1)->orderBy('position', 'ASC')->orderBy('id', 'DESC')->limit(8)->get();
//        $this->categories = $category;
        //$this->menu1 = $menu1;
        view()->share([
            'main_menu1'=>$main_menu1,
            'menu2'=>$menu2,
        ]);
    }
}
