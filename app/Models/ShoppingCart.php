<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_carts';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to Product
    public function products() {
        return $this->hasMany(Product::class, 'id');
    }
}
