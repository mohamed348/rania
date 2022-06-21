<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'id_project',
        'formula',
        'remark',
        
    ];

    public function project(){
        return $this->belongsTo(Project::class,'id_project','id');
                            // model       forign key  owner key
    }
}
