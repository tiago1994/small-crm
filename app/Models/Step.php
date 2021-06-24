<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    public function projects(){
        return $this->hasMany(Project::class, 'step_id', 'id');
    }
}
