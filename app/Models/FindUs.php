<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindUs extends Model
{
    use HasFactory;

    protected $table = 'find_us';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
