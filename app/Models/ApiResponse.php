<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ApiResponse extends Model
{

    protected $primaryKey = null;
    public $timestamps = false;

    protected $fillable = [
        'code',
        'type',
        'message'
    ];
    public function code(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['code'],
            set: fn($value) => ['code' => $value],
        );
    }
    public function type(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['type'],
            set: fn($value) => ['type' => $value],
        );
    }
    public function message(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['message'],
            set: fn($value) => ['message' => $value],
        );
    }
}
