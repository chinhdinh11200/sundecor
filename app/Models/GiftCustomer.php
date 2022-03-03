<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCustomer extends Model
{
    use HasFactory;

    protected $table = 'gift_customer';
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
