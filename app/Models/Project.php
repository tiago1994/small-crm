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
        'city_id',
        'state_id',
        'step_id',
        'title',
        'description',
        'cep',
        'address',
        'number',
        'neighborhood',
        'value'
    ];

    public function client(){
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
    public function step(){
        return $this->hasOne(Step::class, 'id', 'step_id');
    }
    
    public function files(){
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }
}
