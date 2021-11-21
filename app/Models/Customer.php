<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
