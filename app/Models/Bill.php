<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to Product
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
