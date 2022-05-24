<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameGenre extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'acronym',
        'description',
        'pt_br_name',
        'pt_br_description'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
