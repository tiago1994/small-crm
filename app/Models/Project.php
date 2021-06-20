<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'step_id',
        'title',
        'cep',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'value'
    ];
}
