<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'number',
  ];

  public function ship(): BelongsTo {
    return $this->belongsTo(Ship::class);
  }
  public function shipment(): BelongsTo {
    return $this->belongsTo(Shipment::class);
  }

  public function imports(): HasMany {
    return $this->hasMany(Import::class);
  }
}
