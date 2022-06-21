<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
   protected $table = 'projects';
    protected $fillable = [
        'name',
        'content',
        
    ];
    public function property(){
        return $this->hasMany(Property::class);
                           
    }
    public function proposition(){
        return $this->hasMany(Proposition::class);
                           
    }
}
