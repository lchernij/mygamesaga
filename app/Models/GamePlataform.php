<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlataform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
