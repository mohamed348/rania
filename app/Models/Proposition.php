<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'propositions';
    protected $fillable = [
        'id_project',
        'auto_prop',
        
        
    ];
    public function project(){
        return $this->belongsTo(Project::class,'id_project','id');
                            // model       forign key  owner key
    }
}
