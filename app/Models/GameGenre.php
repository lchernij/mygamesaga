<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameGenre extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'acronym',
        'pt_br_name'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    # Localization Functions
    protected function localizationName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
}
