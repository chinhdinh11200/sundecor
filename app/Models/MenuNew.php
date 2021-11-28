<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuNew extends Model
{
    use HasFactory;

    protected $table = 'menu_new';

    protected $fillable  = ['new_id', 'menu_id', 'priority'];
}
