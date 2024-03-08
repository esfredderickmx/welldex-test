<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ShippingLine extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
    'phone_number',
  ];

  public function address(): MorphOne {
    return $this->morphOne(Address::class, 'addressable');
  }

  public function ships(): HasMany {
    return $this->hasMany(Ship::class);
  }
  public function billLandings(): HasMany {
    return $this->hasMany(BillLanding::class);
  }
}
