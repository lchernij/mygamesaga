<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameTag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pt_br_name',
        'en_us_name',
        'is_active'
    ];
}
