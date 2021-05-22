<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleHistory extends Model
{
    use HasFactory;
    protected $table = 'vehicle_history';

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'start',
        'end'
    ];
}
