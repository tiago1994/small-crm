<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'provider_id',
        'description',
        'value'
    ];

    public function provider(){
        return $this->hasOne(Provider::class, 'id', 'provider_id');
    }
    
    public function offer(){
        return $this->hasOne(Offer::class, 'id', 'offer_id');
    }
}
