<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public $timestamps = false;

    public $primaryKey = "id";

    public $fillable = [
      'id',
      'status',
      'complete',
      'pet_id',
      'quantity',
      'ship_date'
    ];

    public function Pet():BelongsTo
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

}
