<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'photo_urls',
        'tag_id',
        'status'
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function Tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }

    public function photoUrls(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => \Storage::url($attributes['photo_urls']),
        );
    }

}
