<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ship extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
  ];

  public function shippingLine(): BelongsTo {
    return $this->belongsTo(ShippingLine::class);
  }

  public function shipments(): BelongsToMany {
    return $this->belongsToMany(Shipment::class)->withTimestamps();
  }

  public function bookings(): HasMany {
    return $this->hasMany(Booking::class);
  }
}
