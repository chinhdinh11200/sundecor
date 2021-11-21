<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to MenuType
    public function menuType() {
        return $this->belongsTo(Menutype::class);
    }
    // connect to Product
    public function products() {
        return $this->belongsToMany(Product::class);
    }

    // connect to News
    public function news() {
        return $this->hasMany(News::class);
    }
}
