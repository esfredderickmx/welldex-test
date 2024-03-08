<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model {
  protected $primaryKey = 'id';

  protected $fillable = [
    'name',
    'type',
    'phone_number',
  ];

  public function address(): MorphOne {
    return $this->morphOne(Address::class, 'addressable');
  }

  public function billLandings(): HasMany {
    return $this->hasMany(BillLanding::class);
  }
}
