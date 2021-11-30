<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    use HasFactory;

    protected $table = 'menu_product';

    protected $primaryKey = 'id';

    public $timestamps = FALSE;

    // protected $fillable = [''];

}
