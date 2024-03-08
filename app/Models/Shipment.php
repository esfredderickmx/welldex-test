<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Shipment extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
  ];

  public function provider(): BelongsTo {
    return $this->belongsTo(Provider::class);
  }

  public function ships(): BelongsToMany {
    return $this->belongsToMany(Ship::class)->withTimestamps();
  }

  public function description(): HasOne {
    return $this->hasOne(ShipmentDescription::class);
  }
  public function booking(): HasOne {
    return $this->hasOne(Booking::class);
  }

  public function originAddress(): MorphOne {
    return $this->morphOne(Address::class, 'addressable');
  }
  public function destinyAddress(): MorphOne {
    return $this->morphOne(Address::class, 'addressable');
  }
}
