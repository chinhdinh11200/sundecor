<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisements';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to AdvertisementType
    public function advertisementType() {
        return $this->belongsTo(AdvertisementType::class);
    }
}
