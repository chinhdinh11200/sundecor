<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['name','code','title','description','content','specifications','sell_price','sale_price','material','size','guarantee','status','image_1','image_2','image_3','is_contact_product','is_sale_in_month','is_hot_product'];

    //connect to Menu
    public function menus() {
        return $this->belongsToMany(Menu::class);
    }

    // connect to Customer
    public function customers() {
        return $this->hasMany(Customer::class);
    }

    // connect to ShoppingCart
    public function shoppingCarts() {
        return $this->hasMany(ShoppingCart::class);
    }

    // connect to Bill
    public function bills() {
        return $this->belongsToMany(Bill::class);
    }

    public function product_menu() {
        return $this->belongsToMany(ProductMenu::class, Menu::class, 'product_id', 'subcategory_id');
    }
}
