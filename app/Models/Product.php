<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

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
}
