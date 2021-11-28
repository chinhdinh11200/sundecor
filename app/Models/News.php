<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'title', 'description', 'image', 'priority', 'status', 'content', 'keyword'];

    // connect to Menu
    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function menuNew() {
        return $this->hasMany(MenuNew::class);
    }
}
