<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $webInfo = WebInfo::first();
        if($webInfo){
            view()->share('webInfo', $webInfo);
        }
        view()->share(['webInfo' => $webInfo]);
    }
}
