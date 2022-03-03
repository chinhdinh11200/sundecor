<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $table = 'menus';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'slug', 'title', 'menu_type_id', 'parent_menu_id', 'keyword', 'status'];

    // connect to MenuType
    public function menuType() {
        return $this->belongsTo(Menutype::class);
    }
    // connect to Product
    public function products() {
        return $this->belongsToMany(Product::class,
                                    'product_menu',
                                    'subcategory_id',
                                    'product_id')->withPivot('priority', 'is_hot');
    }

    public function allProducts() {
        return $this->belongsToMany(Product::class,
                                    Menu::class,
                                    'product_menu',
                                    'subcategory_id',
                                    'product_id');
    }

    // connect to News
    public function news() {
        return $this->hasMany(News::class);
    }

    public function menus2() {
        return $this->hasMany(Menu::class, 'parent_menu_id', 'id');
    }

    public function product_menu(){
        return $this->hasMany(ProductMenu::class, 'subcategory_id', 'id');
    }
    public function product_menu_hot(){
        return $this->hasMany(ProductMenu::class, 'subcategory_id', 'id');
    }

    public function product_menus() {
        return $this->hasManyThrough(ProductMenu::class,Menu::class, 'parent_menu_id', 'subcategory_id', 'id');
    }
}
