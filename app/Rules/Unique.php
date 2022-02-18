<?php

namespace App\Rules;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\News;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Supporter;
use App\Models\Video;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Unique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product = Product::where('name', $value)
                        ->orWhere('code', $value)
                        ->orWhere('title', $value)
                        ->orWhere('slug', Str::slug($value))
                        ->first();

        $menu = Menu::where('name', $value)
                        ->orWhere('title', $value)
                        ->orWhere('slug', Str::slug($value))
                        ->first();

        $banner = Slide::where('title', $value)
                        ->first();

        $video = Video::where('title', $value)
                        ->first();

        $supporter = Supporter::where('fullname', $value)
                        ->first();

        $customer = Customer::where('name', $value)
                        ->orWhere('phone_number', $value)
                        ->first();

        $new = News::where('name', $value)
                        ->orWhere('title', $value)
                        ->orWhere('slug', Str::slug($value))
                        ->first();

        return ($product or $menu or $banner or $new or $video or $supporter or $customer) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute này đã tồn tại.';
    }
}
