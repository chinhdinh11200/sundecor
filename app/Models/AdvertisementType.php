<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementType extends Model
{
    use HasFactory;

    protected $table = 'advertisement_types';

    protected $primaryKey = 'id';

    // protected $fillable = [''];

    // connect to Advertisement
    public function advertisement() {
        return $this->hasMany(Advertisement::class);
    }
}
