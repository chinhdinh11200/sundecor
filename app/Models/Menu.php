<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

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
                                    ProductMenu::class,
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

    public function menuProducts() {
        return $this->hasMany(ProductMenu::class, 'subcategory_id');
    }
}
