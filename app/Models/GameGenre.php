<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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

    # Custom Attributes

    /**
     * Get the genre's short description.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::limit($this->description, 100),
        );
    }

    /**
     * Get the genre's short description in pt_br
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function shortDescriptionPtBr(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::limit($this->pt_br_description, 100),
        );
    }
}
