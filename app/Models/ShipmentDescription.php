<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipmentDescription extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'gross_weight',
    'size',
    'items',
    'dimensions',
    'brand',
    'type',
  ];

  public function shipment(): BelongsTo {
    return $this->belongsTo(Shipment::class);
  }
}
