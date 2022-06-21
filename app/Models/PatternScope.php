<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatternScope extends Model
{
    use HasFactory;
    protected $table = 'pattern_scopes';
    protected $fillable = [
        'pattern_id',
        'scope_id',
        'formula',
        'nl_formula'
        
    ];
}
