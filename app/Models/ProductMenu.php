<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    use HasFactory;

    protected $table = 'product_menu';

    protected $primaryKey = 'id';

    public $timestamps = FALSE;

    // protected $fillable = [''];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
