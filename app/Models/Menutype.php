<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menutype extends Model
{
    use HasFactory;

    protected $table = 'menu_types';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to Menu
    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
