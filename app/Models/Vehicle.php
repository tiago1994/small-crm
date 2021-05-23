<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function history(){
        return $this->hasOne(VehicleHistory::class)->orderBy('id', 'DESC');
    }
    
    public function histories(){
        return $this->hasMany(VehicleHistory::class)->orderBy('id', 'DESC');
    }
}
